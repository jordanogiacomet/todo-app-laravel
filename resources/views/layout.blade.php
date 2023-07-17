<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/home.js')}}"></script>
    <title>Document</title>
</head>
<body class="xl:container xl:mx-auto">
    @include('header')
    <div>
        @yield('content')
    </div>
</body>