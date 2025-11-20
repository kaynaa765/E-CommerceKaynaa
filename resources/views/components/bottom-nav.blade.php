<style>
    /* Bottom Navigation */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 480px;
        height: 50px;
        background: linear-gradient(90deg, #E75480 0%, #F085B2 50%, #F5A9D0 100%);
        display: flex;
        justify-content: space-around;
        align-items: center;
        box-shadow: 0 -2px 8px rgba(231, 84, 128, 0.2);
        z-index: 1000;
        padding: 0;
        margin: 0;
    }

    .bottom-nav a, .bottom-nav button {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 2px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 9px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: none;
        background: none;
        cursor: pointer;
        width: 100%;
        height: 100%;
        flex: 1;
    }

    .bottom-nav a:hover, .bottom-nav button:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
    }

    .bottom-nav a.active {
        color: white;
    }

    .bottom-nav-icon {
        font-size: 20px;
    }

    body {
        padding-bottom: 70px;
    }

    main {
        padding-bottom: 20px;
    }
</style>

<nav class="bottom-nav">
    @auth
        <a href="{{ route('dashboard') }}" class="bottom-nav-item">
            <span class="bottom-nav-icon">🏠</span>
            <span>Home</span>
        </a>
    @endauth
    @guest
        <a href="{{ route('welcome') }}" class="bottom-nav-item">
            <span class="bottom-nav-icon">🏠</span>
            <span>Home</span>
        </a>
    @endguest
    <a href="{{ route('cart.index') }}" class="bottom-nav-item">
        <span class="bottom-nav-icon">🛍️</span>
        <span>Keranjang</span>
    </a>
    <a href="{{ route('welcome') }}" class="bottom-nav-item">
        <span class="bottom-nav-icon">🔍</span>
        <span>Cari</span>
    </a>
    @auth
        <a href="{{ route('profile.show') }}" class="bottom-nav-item">
            <span class="bottom-nav-icon">👤</span>
            <span>Profil</span>
        </a>
    @endauth
</nav>
