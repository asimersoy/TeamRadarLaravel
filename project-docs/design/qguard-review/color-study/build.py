"""Build isolated color-study copies from the accepted QGuard prototype."""
from pathlib import Path
import base64
import json
import re

HERE = Path(__file__).resolve().parent
ROOT = HERE.parent
palettes = json.loads((HERE / 'palettes.json').read_text())
# Historical study: never rebuild from the subsequently approved palette.
source = (HERE / 'baseline.html').read_text()
source_assets = json.JSONDecoder().raw_decode(source.split('const brandAssets = ', 1)[1])[0]

for palette in palettes:
    # Recolor only the original path artwork; geometry and lettering stay exact.
    assets = {}
    for key, uri in source_assets.items():
        svg = base64.b64decode(uri.split(',')[1]).decode()
        replacements = {'#c9e99b':palette['accent'], '#ecf2e9':palette['ink'],
                        '#b5c8bb':palette['muted'], '#245f4c':palette['accent'],
                        '#172b28':palette['ink'], '#5a6c66':palette['muted'],
                        '#181818':palette['ink']}
        for old, new in replacements.items():
            svg = svg.replace(old, new)
        assets[key] = 'data:image/svg+xml;base64,' + base64.b64encode(svg.encode()).decode()
    html = source.replace('ARCHIVED BASELINE','ARCHIVED COLOR STUDY').replace('DESIGN PREVIEW','ARCHIVED COLOR STUDY').replace('const brandAssets = '+json.dumps(source_assets)+';',
                          'const brandAssets = '+json.dumps(assets)+';')
    token_names = ('bg','panel','ink','muted','line','nav','nav-ink','accent','accent-ink','soft','danger','warning')
    declarations = ';'.join('--'+key+':'+palette[key] for key in token_names)
    css = '''
body[data-theme] { TOKENS; color-scheme:dark; }
body[data-theme] .nav a.active { background:var(--accent); color:var(--accent-ink); }
body[data-theme] .sidebar, body[data-theme] .sidebar-tip { border-color:var(--line); }
body[data-theme] .sidebar .avatar { background:var(--soft); color:var(--ink); }
body[data-theme] .notice.warn { background:#332B1D; }
body[data-theme] .notice.error { background:#352121; }
body[data-theme] .headline-accent, body[data-theme] .auth-intro .eyebrow { color:var(--accent); }
body[data-theme] .auth-intro { background:radial-gradient(ellipse at bottom left,var(--soft),transparent 70%),var(--nav); }
body[data-theme] .rank-icon { border-color:var(--accent); color:var(--accent); }
body[data-theme] .pill.accent { color:var(--accent); }
body[data-theme] .roster-row .avatar { background:var(--soft); color:var(--ink); }
body[data-theme] .roster-row:nth-child(3n) .avatar { background:#3A3023; color:#E9D7B6; }
body[data-theme] .roster-row:nth-child(4n) .avatar { background:#293B49; color:#CBDFEF; }
body[data-theme] .public-shell { background:radial-gradient(ellipse at 85% 20%,var(--soft),transparent 55%),var(--bg); }
body[data-theme] .btn.danger { color:#251512; }
body[data-theme] input::placeholder, body[data-theme] textarea::placeholder { color:var(--muted); opacity:1; }
.review-bar { background:#13151A; color:#DEE1E8; border-color:#414650; }
.color-label { font-size:10px; }
'''.replace('TOKENS', declarations)
    html = html.replace('</head>', '<style id="color-study-tokens">'+css+'</style></head>')
    # Do not read or overwrite the main prototype's stored sample state.
    html = html.replace('qguard_design_review_v1', 'qguard_color_'+palette['id']+'_v1')
    html = html.replace('qguard_design_theme', 'qguard_color_'+palette['id']+'_theme')
    html = html.replace('function theme(value){', "function theme(value){value='refined';")
    html = re.sub(r'<select id="theme">.*?</select>',
        '<select id="theme" hidden aria-hidden="true"><option value="refined">Color study</option></select>'
        '<span class="color-label">'+palette['letter']+' · '+palette['name']+'</span>'
        '<a href="index.html?palette='+palette['id']+'">Compare colors</a>',html,count=1)
    html = html.replace('<title>QGuard · Design review</title>', '<title>QGuard · '+palette['name']+'</title>')
    (HERE / (palette['id']+'.html')).write_text(html)

template = (HERE / 'viewer.template.html').read_text()
(HERE / 'index.html').write_text(template.replace('__PALETTES__', json.dumps(palettes)))
cards = []
for palette in palettes:
    cards.append('<article><h2><span style="background:'+palette['accent']+'"></span>'
                 +palette['letter']+' · '+palette['name']+'</h2><p>'+palette['description']+'</p>'
                 +'<a href="'+palette['id']+'.html#dashboard"><img src="evidence/'+palette['id']+'-dashboard.png" alt="'+palette['name']+' matchmaking sample"></a>'
                 +'<a href="'+palette['id']+'.html#login"><img src="evidence/'+palette['id']+'-login.png" alt="'+palette['name']+' sign-in sample"></a>'
                 +'<a class="open" href="index.html?palette='+palette['id']+'">Explore '+palette['letter']+' full size ↗</a></article>')
board = '''<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>QGuard · Dark palette samples</title><style>
*{box-sizing:border-box}body{margin:0;padding:38px;background:#101114;color:#F0F1F4;font:14px/1.5 system-ui,sans-serif}header{margin-bottom:28px}h1{font-size:34px;letter-spacing:-1px;margin:5px 0}header>span{font-size:11px;letter-spacing:2px;color:#B8BBC5}p{margin:0;color:#B8BBC5}.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}article{min-width:0}h2{font-size:19px;display:flex;gap:10px;align-items:center;margin:0 0 6px}h2 span{width:16px;height:16px;border-radius:50%}article p{font-size:12px;margin-bottom:16px}img{display:block;width:100%;height:auto;border:1px solid #494E5B;border-radius:8px;margin-bottom:18px}a{color:#CFDAF5}a:focus-visible{outline:3px solid #A9C7FF;outline-offset:3px}.open{font-size:13px}footer{margin-top:28px;font-size:12px;color:#B8BBC5}@media(max-width:800px){body{padding:22px}.grid{grid-template-columns:1fr}h1{font-size:26px}}
</style></head><body><header><span>QGUARD · COLOR DIRECTION</span><h1>Earlier palette comparison</h1><p>Matchmaking above, sign-in below. The layout and logo shapes are identical.</p></header><main class="grid">CARDS</main><footer>Historical samples. Calibrated A is now applied to the current design. <a href="../qguard-review.html#dashboard">Open current design ↗</a> <a href="index.html">Open the page and palette switcher ↗</a></footer></body></html>'''
(HERE / 'comparison.html').write_text(board.replace('CARDS',''.join(cards)))
print('Built three isolated palettes and the color comparison viewer.')
