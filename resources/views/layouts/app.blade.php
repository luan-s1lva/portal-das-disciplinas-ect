<!DOCTYPE html>
<html lang="pt_BR">
<head>
    
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="CaID-sWQ4oro51-MUzVaQlu5v5a4XqK2Xpg9uVmONKI" />
    <meta name="lang" content="pt-BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="portal das disciplinas, imd">
    <meta name="robots" content="@yield('robots','all')">
    <title>@yield('title', 'Portal das Disciplinas IMD')</title>
    <meta name="description" content="@yield('description','Conheça as disciplinas do IMD de forma mais prática!')">
    {{-- bootstrap CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/discipline.css')}}">
    {{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> --}}
    @yield('styles-head')
    {{-- CSRF Laravel --}}
    <meta name="csrf-token" content="{{csrf_token()}}">
    {{-- SCRIPTS JS --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    @yield('scripts-head')
</head>

<body class="content-body d-flex flex-column min-vh-100">
    @include('components.navbar')

    {{-- Sidebar desativado por enquanto --}}
    @isset($success)
    <div class="alert alert-success border-left-success" role="alert">
        <span>{{ $success }}</span>
    </div>
    @endisset

    @include('components.sidebar')

    <div class="container mb-5">
        @yield('content')
    </div>

    @include('components.footer')
    {{-- bootstrap JS --}}
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    {{-- Sidebar JS --}}
    <script src="{{asset('js/sidebar.js')}}" type="text/javascript"></script>
    @yield('scripts-bottom')

</body>
</html>
