<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Loading - Kayna Beauty</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            width: 100%;
            overflow-x: hidden;
            background: linear-gradient(135deg, #FFB6D9 0%, #FFD4E5 30%, #FFE8F0 70%, #F5E6D3 100%);
        }

        body {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #FFB6D9 0%, #FFD4E5 30%, #FFE8F0 70%, #F5E6D3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        .loading-wrapper {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Background decoration */
        .bg-decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .circle-1 {
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 182, 217, 0.3);
            border-radius: 50%;
            top: -50px;
            right: -30px;
            animation: float 6s ease-in-out infinite;
        }

        .circle-2 {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 212, 229, 0.3);
            border-radius: 50%;
            bottom: 50px;
            left: -40px;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(20px);
            }
        }

        .loading-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(201, 31, 106, 0.25), 0 0 80px rgba(231, 84, 128, 0.1);
            max-width: 320px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            animation: slideUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 10;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-wrapper {
            margin-bottom: 35px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.08);
                opacity: 0.9;
            }
        }

        .logo-circle {
            width: 110px;
            height: 110px;
            background: linear-gradient(135deg, #FFB6D9 0%, #FFD4E5 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(231, 84, 128, 0.4), inset 0 -2px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.8);
            position: relative;
        }

        .logo-circle::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            border-radius: 50%;
        }

        .logo-circle img {
            width: 85%;
            height: 85%;
            object-fit: contain;
            position: relative;
            z-index: 2;
        }

        .loading-text {
            font-size: 22px;
            font-weight: 800;
            color: #8B1538;
            margin-bottom: 12px;
            letter-spacing: 0.8px;
            background: linear-gradient(135deg, #E75480 0%, #C91F6A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .loading-message {
            font-size: 13px;
            color: #9B4A6B;
            margin-bottom: 32px;
            line-height: 1.6;
            font-weight: 500;
        }

        .spinner {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 28px;
        }

        .spinner-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, #E75480 0%, #F085B2 100%);
            animation: bounce 1.4s infinite ease-in-out both;
            box-shadow: 0 2px 8px rgba(231, 84, 128, 0.3);
        }

        .spinner-dot:nth-child(1) {
            animation-delay: -0.32s;
        }

        .spinner-dot:nth-child(2) {
            animation-delay: -0.16s;
        }

        .spinner-dot:nth-child(3) {
            animation-delay: 0s;
        }

        @keyframes bounce {
            0%, 80%, 100% {
                transform: scale(0);
                opacity: 0.5;
            }
            40% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #FFE8F0 0%, #FFD4E5 100%);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 24px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #E75480 0%, #F085B2 50%, #FFB6D9 100%);
            animation: fillProgress 3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(231, 84, 128, 0.5);
        }

        @keyframes fillProgress {
            from {
                width: 0%;
            }
            to {
                width: 100%;
            }
        }

        .kayna-brand {
            margin-top: 28px;
            font-size: 12px;
            font-weight: 700;
            color: #8B1538;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.8;
        }

        .status-text {
            margin-top: 8px;
            font-size: 11px;
            color: #C91F6A;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

    </style>
</head>
<body>
    <div class="loading-wrapper">
        <div class="bg-decoration">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
        </div>

        <div class="loading-container">
            <div class="logo-wrapper">
                <div class="logo-circle">
                    <img src="{{ asset('images/Logo.jpeg') }}" alt="Kayna Beauty">
                </div>
            </div>

            <div class="loading-text">Memproses</div>
            <div class="loading-message">Menyiapkan dashboard Anda<br>dengan sempurna...</div>

            <div class="spinner">
                <span class="spinner-dot"></span>
                <span class="spinner-dot"></span>
                <span class="spinner-dot"></span>
            </div>

            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>

            <div class="kayna-brand">KAYNA BEAUTY</div>
            <div class="status-text">Sebentar lagi...</div>
        </div>
    </div>

    <script>
        // Redirect ke dashboard setelah 3 detik
        setTimeout(function() {
            window.location.href = '{{ route("siswa.dashboard") }}';
        }, 3000);
    </script>
</body>
</html>
