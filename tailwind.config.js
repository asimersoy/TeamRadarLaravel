module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',

    // include vendor views/components you use:
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/livewire/flux-pro/stubs/**/*.blade.php',
    './vendor/livewire/flux/stubs/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        bg: { 900: '#0b1020', 800: '#121831', 700: '#1a2342' },
        ink: { 100: '#d5ddf7', 300: '#98a2c9', 500: '#7e89b6' },
        brand: { 400: '#72d6f5', 500: '#4cc9f0', 600: '#36a9ce' },
        accent: { 500: '#ffd166' },
        success: { 500: '#34d399' },
        danger: { 500: '#ef4444' },
      },
      boxShadow: {
        card: '0 8px 30px rgba(0,0,0,.35), inset 0 1px 0 rgba(255,255,255,.02)',
      },
      borderRadius: { xl: '14px' },
      fontFamily: {
        // If you want to keep Instrument Sans, add it here; or set your own
        sans: ['ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'Noto Sans', 'Ubuntu', 'Cantarell', 'Helvetica Neue', 'Arial', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
