<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/@heroicons/vue@2.0.16/20/solid/index.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/vue@2.0.16/20/solid/style.css" rel="stylesheet">
</head>
<body>

<div>
    {{$slot}}
</div>
</body>
</html>
