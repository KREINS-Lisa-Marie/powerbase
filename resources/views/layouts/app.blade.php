<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="Powerbase, electrician, électricien">
    <meta name="author" content="Lisa-Marie Kreins">
    <meta name="description" content="La page de Powerbase">
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="body-style background-admin">
<x-admin.sidebar></x-admin.sidebar>


    {{ $slot }}

</body>
</html>
