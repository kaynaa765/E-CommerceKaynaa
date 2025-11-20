<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            background: #f5f5f5;
            width: 100%;
        }
        body {
            background: #f5f5f5;
            width: 100%;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>