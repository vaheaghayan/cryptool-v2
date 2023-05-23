<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    @vite(['resources/js/app.js'])
    @vite('resources/downloaded/css/w3.css')
    @vite('resources/downloaded/css/font.css')
    @vite('resources/downloaded/css/font2.css')
    @vite('resources/downloaded/css/font-awesome.css')
    @vite(['resources/css/app.css'])
    @vite('resources/downloaded/js/jquery3.6.0.js')
    @vite('resources/downloaded/css/bootstrap.min.css')

    <!-- Scripts -->
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
        .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
        .fa-anchor,.fa-coffee {font-size:200px}
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    @if (isset($header))
        <header class="w3-container w3-light-gray w3-center" style="padding:128px 16px">
            <h1 class="w3-margin w3-jumbo">{{ $header }}</h1>
        </header>

    @endif
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    @include('layouts.modal')
    @include('layouts.footer')

</div>
</body>

@vite('resources/downloaded/js/popper.min.js')
@vite('resources/downloaded/js/bootstrap.min.js')

<script>
    function showModal() {
        $("#myModal").modal();
    }

        var $wwwUrl = '{{url('/')}}';
        var $apiUrl = $wwwUrl;
</script>
</html>
