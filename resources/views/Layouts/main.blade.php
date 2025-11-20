<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/Logo.jpeg') }}" alt="Kayna Beauty" class="logo-img">
            <span>Kayna Beauty</span>
        </div>
        <nav>
                @auth
                    <a href="{{ route('cart.index') }}" id="cart-link" class="cart-link-header" title="Keranjang">
                        🛍️
                        <span class="cart-count">{{ count(session('cart', [])) }}</span>
                    </a>
                    <span>{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
                @guest
                    <a href="{{ route('cart.index') }}" id="cart-link" class="cart-link-header" title="Keranjang">
                        🛍️
                        <span class="cart-count">{{ count(session('cart', [])) }}</span>
                    </a>
                    <a href="{{ route('auth.choice') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 1rem; margin: 1rem; border-radius: 8px; border-left: 4px solid #28a745;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>© 2023 Kayna Beauty. Komunitas Kosmetik Terlengkap.</p>
    </footer>

    @include('components.bottom-nav')

    <script>
        // Global function untuk update cart count
        window.updateCartCount = function(count) {
            // Update header cart badge
            const cartLink = document.getElementById('cart-link');
            if (cartLink) {
                const cartCount = cartLink.querySelector('.cart-count');
                if (cartCount) {
                    cartCount.textContent = count > 0 ? count : '';
                }
            }
            
            // Update bottom nav cart badge
            const cartItem = document.querySelector('.cart-item');
            if (cartItem) {
                let badge = cartItem.querySelector('.badge');
                if (!badge && count > 0) {
                    badge = document.createElement('span');
                    badge.className = 'badge';
                    cartItem.appendChild(badge);
                }
                if (badge) {
                    badge.textContent = count;
                    badge.style.display = count > 0 ? 'inline-block' : 'none';
                }
            }
        };

        // Global function untuk show notification
        window.showNotification = function(message, type = 'success') {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#4CAF50' : '#f44336'};
                color: white;
                padding: 16px 24px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                z-index: 9999;
                animation: slideIn 0.3s ease-out;
                font-weight: 600;
                max-width: 300px;
            `;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }, 2500);
        };
    </script>
</body>
</html>