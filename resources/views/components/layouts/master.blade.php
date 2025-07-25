<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @vite('resources/css/app.css')
{{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Inside your <head> tag -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@heroicons/vue@2.0.16/20/solid/index.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@2.0.16/20/solid/style.css" rel="stylesheet">
</head>

<body class="font-sans">
<div>
    <x-partials.nav/>
</div>

<div>
    {{$slot}}
</div>

<div>
    <x-partials.footer />
</div>

</body>
</html>
