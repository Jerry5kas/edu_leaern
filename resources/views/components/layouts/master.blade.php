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

</head>

<body>
<div>
    <x-partials.nav/>
</div>

<div>
    {{$slot}}
</div>

</body>
</html>
