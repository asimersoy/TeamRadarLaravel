"""Build an isolated, allowlisted Riot review artifact; never publish it."""
import argparse
import base64
import hashlib
import html
import json
from pathlib import Path
import re
import subprocess
import zipfile

SOURCE = Path(__file__).resolve().parent
REPO = SOURCE.parents[2]
DESIGN = REPO / "project-docs/design/qguard-review"


def sha256(data):
    return hashlib.sha256(data).hexdigest()


def secure_document(document):
    scripts = re.findall(r"<script>(.*?)</script>", document, re.S)
    hashes = ["'sha256-" + base64.b64encode(hashlib.sha256(s.encode()).digest()).decode() + "'" for s in scripts]
    policy = ("default-src 'none'; script-src " + (" ".join(hashes) or "'none'")
              + "; style-src 'unsafe-inline'; img-src 'self' data:; connect-src 'none';"
              + " form-action 'none'; base-uri 'none'; object-src 'none'")
    metadata = '<meta http-equiv="Content-Security-Policy" content="' + html.escape(policy, quote=True) + '">\n'
    if 'name="robots"' not in document:
        metadata += '<meta name="robots" content="noindex,nofollow">\n'
    if 'name="referrer"' not in document:
        metadata += '<meta name="referrer" content="no-referrer">\n'
    return document.replace('<meta charset="utf-8">', '<meta charset="utf-8">\n' + metadata, 1)


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--output", type=Path, required=True, help="Fresh output directory outside the Git repository")
    args = parser.parse_args()
    output = args.output.resolve()
    if output == REPO or REPO in output.parents:
        parser.error("Choose an output directory outside the repository")
    if output.exists():
        parser.error("Output already exists; use a fresh path to preserve prior evidence")
    subprocess.run(["python3", str(DESIGN / "build-standalone.py"), "--check"], check=True)
    guide = (SOURCE / "reviewer-guide.html").read_text()
    walkthrough = (DESIGN / "qguard-review.html").read_text()
    # Copy only these files; never archive a source tree or environment directory.
    files = {
        "index.html": secure_document(guide).encode(),
        "walkthrough.html": secure_document(walkthrough).encode(),
        "brand.svg": (DESIGN / "brand/qguard-wide-dark.svg").read_bytes(),
    }
    (output / "site").mkdir(parents=True)
    for name, data in files.items():
        (output / "site" / name).write_bytes(data)
    revision = subprocess.check_output(["git", "rev-parse", "HEAD"], cwd=REPO, text=True).strip()
    manifest = {
        "status": "local-preparation-not-approved-for-submission",
        "baseline_commit": revision,
        "source_files": {str(p.relative_to(REPO)): sha256(p.read_bytes()) for p in [
            SOURCE / "reviewer-guide.html", SOURCE / "build-package.py", DESIGN / "qguard-review.html",
            DESIGN / "brand/qguard-wide-dark.svg",
        ]},
        "site_files": {name: {"sha256": sha256(data), "bytes": len(data)} for name, data in files.items()},
        "submission_gates": ["host-domain", "operator-contact", "final-terms-privacy", "hosted-verification", "owner-submission-authorization"],
    }
    (output / "manifest.json").write_text(json.dumps(manifest, indent=2) + "\n")
    (output / "application-draft.md").write_text((SOURCE / "application-draft.md").read_text())
    (output / "HANDOFF.txt").write_text(
        "LOCAL PREPARATION ONLY. Not submitted, deployed or approved.\n"
        "Serve site/index.html over HTTP(S). No backend or background services needed.\n"
        "Complete approved Terms/Privacy/contact links and hosting review before submission.\n"
        "Only site/ belongs in a future approved web root. Other files are internal handoff.\n"
        "Use host-level frame-ancestors 'none', nosniff and no-referrer headers.\n"
        "Follow the tracked readiness checklist; do not enable real registration.\n"
    )
    archive = output / "qguard-riot-review-site.zip"
    with zipfile.ZipFile(archive, "w", compression=zipfile.ZIP_DEFLATED) as bundle:
        for name, data in sorted(files.items()):
            info = zipfile.ZipInfo(name, date_time=(2026, 10, 29, 0, 0, 0))
            info.compress_type = zipfile.ZIP_DEFLATED
            bundle.writestr(info, data)
    (output / "archive.sha256").write_text(sha256(archive.read_bytes()) + "  " + archive.name + "\n")
    print(json.dumps({"output": str(output), "public_files": list(files), "archive_sha256": sha256(archive.read_bytes())}))


if __name__ == "__main__":
    main()
