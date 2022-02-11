<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
  </head>
  <body class="text-center">
    <main class="form-signin">
      @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
