<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

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

    

    .hero {
        position: relative;
        width: 100%;
        height: 92vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<body>
    <x-header />
    <main>
        <section class="hero">
        </section>
    </main>
</body>
</html>