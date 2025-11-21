<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: var(--font-sans, 'Segoe UI', Arial, sans-serif);
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            min-height: 100vh;
        }
        main {
            max-width: 480px;
            margin: 0 auto;
            padding: 16px 8px 80px 8px;
            box-sizing: border-box;
        }
        @media (max-width: 600px) {
            main {
                max-width: 100vw;
                padding-left: 4vw;
                padding-right: 4vw;
            }
        }
    </style>
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
    <div class="admin-mobile-container">
        @yield('content')
    </div>
    <style>
        .admin-mobile-container {
            max-width: 480px;
            margin: 0 auto;
            background: #f8f5f2;
            min-height: 100vh;
            border-radius: 18px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.04);
            padding-bottom: 80px;
        }
        @media (max-width: 600px) {
            .admin-mobile-container {
                max-width: 100vw;
                border-radius: 0;
            }
        }
    </style>
</body>
</html>