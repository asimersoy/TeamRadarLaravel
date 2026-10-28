import turkish from '../../lang/tr.json';
export function t(key, values = {}) {
    let text = document.documentElement.lang === 'tr' ? (turkish[key] ?? key) : key;
    for (const [name, value] of Object.entries(values)) text = text.replaceAll(`:${name}`, String(value));
    return text;
}
