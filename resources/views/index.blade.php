<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>

    @vite('resources/css/app.css')
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
    }

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

    .hero {
        position: relative;
        width: 100%;
        height: 92vh;
        background: url('https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?cs=srgb&dl=pexels-pixabay-258154.jpg&fm=jpg') no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-text {
        text-align: center;
        color: white;
        padding: 20px;
        border-radius: 8px;
    }

    .hero-text h1 {
        font-size: 3rem;
    }

    .search-bar {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .search-bar input {
        padding-top: 10px;
        padding-left: 20px;
        border-radius: 50px 0 0 50px;
        border: none;
        width: 300px;
        height: 50px;
    }

    .search-bar button {
        padding: 10px 20px;
        border-radius: 0 50px 50px 0;
        border: none;
        background-color: #019A97;
        color: white;
    }

    .stats {
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: space-around;
        color: white;
        font-size: 18px;
        background: rgba(255, 255, 255, 0.2);
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .stats span {
        font-weight: light;
        font-size: 45px;
    }

    .stats p {
        font-size: 20px;
        letter-spacing: 1px;
        padding-top: 15px;
        font-weight: 100;
    }
</style>

<body>
    <div class="#">
        <div class="#">
            <header>
            <img src="{{ asset('images/IpsumLogo.png') }}" alt="Logo">
            <nav>
                <a href="#">Home</a>
                <a href="#">Search</a>
                <a href="#">Booked</a>
                <a href="#">Ipsum</a>
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
                <a href="{{ route('login') }}">Sign in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </header>

        <section class="hero">
        <div class="hero-text">
            <h1>Just A Few Clicks Away<br>From Your Dream Destination</h1>
            <div class="search-bar">
                <input type="text" placeholder="See our list here">
                <button>Search</button>
            </div>
        </div>
        <div class="stats">
            <div>
                <p>Discover comfort and luxury, your prefect getaway.<br>
                Whether you're traveling for business or pleasure.</p>
            </div>
            <div>
                <span>700+</span><br>Satisfied Customers
            </div>
            <div>
                <span>1k+</span><br>Residence Options
            </div>
        </div>
    </section>
</body>
</html>