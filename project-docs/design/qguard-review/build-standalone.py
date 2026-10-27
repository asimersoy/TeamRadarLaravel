"""Bundle the review prototype and its brand assets without app dependencies."""
from pathlib import Path
import base64
import json

ROOT = Path(__file__).resolve().parent


def data_uri(path):
    mime = "image/svg+xml" if path.suffix == ".svg" else "image/png"
    return f"data:{mime};base64," + base64.b64encode(path.read_bytes()).decode()


html = (ROOT / "prototype/index.html").read_text()
css = (ROOT / "prototype/styles.css").read_text()
script = (ROOT / "prototype/app.js").read_text()
assets = {f"{shape}-{tone}": data_uri(ROOT / f"brand/qguard-{shape}-{tone}.svg")
          for shape in ("wide", "compact") for tone in ("light", "dark", "mono")}
assert "const brandAssets = {};" in script
script = script.replace("const brandAssets = {};", "const brandAssets = " + json.dumps(assets) + ";")
html = html.replace('<link rel="stylesheet" href="styles.css">', "<style>\n" + css + "</style>")
html = html.replace('<script src="app.js"></script>', "<script>\n" + script + "</script>")
for asset in ("favicon.svg", "qguard-icon-180.png"):
    html = html.replace(f"../brand/{asset}", data_uri(ROOT / f"brand/{asset}"))
(ROOT / "qguard-review.html").write_text(html)
print("Bundled HTML, CSS, JS and brand images into qguard-review.html")
