<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Stackflows Demo App')</title>
    <meta name="description" content="">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>
<body>

@include('layouts._header')

<main class="h-100">
    @yield('content')
</main>


<script src="{{ asset('/js/app.js') }}"></script>

@stack('scripts')
</body>
</html>
