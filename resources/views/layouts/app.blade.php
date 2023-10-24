<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sushi Together</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" href="/css/reset_styles.css"/>
        <link rel="stylesheet" type="text/css" href="/css/app.css"/>
    </head>
    <body>
        <div class="wrapper">
            <header class="background_dark">
                @include('partials.header')
            </header>


            <main class="background_dark">
                 @yield('content')
            </main>

            {{-- @section('main_tabs')
                This is the master main_tabs.
            @show --}}


            <footer class="background_dark" style="border: 1px solid green;">
                @include('partials.footer')
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
