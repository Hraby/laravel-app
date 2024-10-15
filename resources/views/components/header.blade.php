<style>
     header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: white;
        position: relative;
        z-index: 10;
    }

    header img {
        width: 70px;
        height: 50px;
    }

    nav {
        display: flex;
        gap: 20px;
    }

    nav a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
    }
    .cta-buttons {
        display: flex;
        gap: 10px;
    }

    .cta-buttons a {
        padding: 10px 20px;
        border-radius: 20px;
        border: 1px solid #4CAF87;
        text-decoration: none;
        color: #019A97;
    }

    .cta-buttons a:nth-child(2) {
        background-color: #019A97;
        color: white;
    }
</style>


<header>
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }}"><img src="{{ asset('images/IpsumLogo.png') }}" alt="Logo"></a>
    <nav>
        <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
        <a href="/hotel" class="{{ Request::is('hotel') ? 'active' : '' }}">Search</a>
        <a href="/reservations" class="{{ Request::is('reservations') ? 'active' : '' }}">Reservations</a>
        <a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a>
    </nav>
    <div class="cta-buttons">
        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
            >
                Dashboard
            </a>
        @else
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="{{ Request::is('login') ? 'active' : '' }}">Sign in</a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="{{ Request::is('register') ? 'active' : '' }}">Register</a>
            @endif
        @endauth
    </div>
</header>
