<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ $title ?? 'QueueGuard' }}</title>
      {{-- Include any CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    .panel { background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02)), rgba(18,24,49,0.9); backdrop-filter: blur(8px); }
    .rank-pill { border-image: linear-gradient(90deg,#ffd166,#72d6f5) 1; border-width:1px; border-style:solid; }
    .glow { box-shadow: 0 0 0 2px rgba(76,201,240,.15), 0 8px 30px rgba(76,201,240,.15); }
    .grid-lines {
      background:
        linear-gradient(transparent 23px, rgba(255, 255, 255, 0.04) 24px),
        linear-gradient(90deg, transparent 23px, rgba(255, 255, 255, 0.04) 24px);
      background-size: 24px 24px;
    }
  </style>
</head>
<body class="bg-bg-900 text-ink-100 font-sans min-h-screen grid-lines flex flex-col">

  <x-header />

  <main class="flex-grow">
    @yield('content')
  </main>

  <x-footer />
</body>
</html>
