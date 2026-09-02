@props(['title'=>null])
@php(
    $currentRoute = Route::currentRouteName()
)
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
<body class="body-style background-public">
@if( !str_starts_with($currentRoute, 'auth.'))
    <x-public.navigation></x-public.navigation>
@endif

<main class=" public-main" id="content">
    {{ $slot }}
</main>
</body>
</html>
