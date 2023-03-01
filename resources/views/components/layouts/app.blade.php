<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Perpustakaan' }}</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('/build/assets/app-9a25e63b.js') }}" defer></script>
</head>

<body>
    {{ $slot }}
</body>

</html>
