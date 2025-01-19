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
    
    <!-- Collegamento a Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Collegamento a FontAwesome per l'icona dell'ingranaggio -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="/css/reset_styles.css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="/css/app.css"/> -->
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

        footer {
            position: sticky;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    
    <!-- Menu Hamburger Collassabile -->
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Contenuto del menu</h5>
            <span class="text-muted">Testo del menu espandibile.</span>
        </div>
    </div>


    <header class="navbar navbar-dark bg-dark">
        @include('partials.header')
    </header>

    <!-- Contenuto principale -->
    <main class="background_dark">
        @yield('content')
    </main>

    <!-- Footer incollato al fondo della pagina -->
    <footer class="bg-dark text-center py-3">
        @include('partials.footer')
    </footer>


    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>