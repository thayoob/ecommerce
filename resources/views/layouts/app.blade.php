<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="Laravel Ecom">

    @livewireStyles

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('assets\css\bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\custom.css') }}">

</head>

<body>
    <div id="app">

        @include('partials.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="{{ asset('assets\js\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets\js\jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            window.livewire.on('message', (message) => {
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify(message.text, message.type);
            });
        });
    </script>
    {{-- <script>
        document.addEventListener('livewire:init', () => {
            window.livewire.on('message', (message) => {
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify(message.text, message.type);
            });
        });
    </script> --}}

</body>

</html>
