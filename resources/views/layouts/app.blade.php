<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('head')
  </head>
  <body class="font-sans antialiased bg-gray-100">

    <x-header />

    <main class="p-4">
        @yield('content') {{-- Aqui é onde o conteúdo das páginas será inserido --}}
    </main>
    
  </body>
</html>
