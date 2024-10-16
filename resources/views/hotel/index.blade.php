<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Hotels</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        * {
            font-family: "Roboto", sans-serif !important;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f5f5f5;
            margin: 0;
        }

        main {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .sidebar {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            height: 400px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 20px; 
        }

        .sidebar h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        .sidebar input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .hotel-container {
            display: flex;
            flex-direction: column;
        }

        .maintext-main {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .hotelsoption {
            margin-bottom: 30px;
            font-size: 18px;
        }

        .hotel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .hotel-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .hotel-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .hotel-item p {
            margin: 10px;
            font-size: 16px;
            color: #333;
        }

        .nazevhotelupodobrazek {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .hotel-item a {
            display: inline-block;
            margin: 10px;
            color: #138d75;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .hotel-item a:hover {
            color: #0e6655;
        }

        @media (max-width: 768px) {
            main {
                grid-template-columns: 1fr;
                padding: 10px;
            }

            .sidebar {
                margin-bottom: 20px;
                width: 100%;
                position: relative; 
                top: 0;
            }

            .hotel-container {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <x-header />

    <main>
        <section class="sidebar">
            <h3>Location</h3>
            <input type="text" value="New York City, USA">

            <h3>Person</h3>
            <input type="number" value="2" min="1">

            <h3>Check-in</h3>
            <input type="date" value="2024-11-17">

            <h3>Check-out</h3>
            <input type="date" value="2024-11-18">
        </section>

        <section class="hotel-container">
            <h1 class="maintext-main">Hotels in <span class="strongtext">New York City, USA</span></h1>
            <h3 class="hotelsoption">We found <span class="strongtext">{{ $hotels->count() }}</span> options</h3>

            <div class="hotel-grid">

                @foreach($hotels as $hotel)
                <div class="hotel-item">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/8a/e0/b9/bellagio-las-vegas.jpg?w=1200&h=-1&s=1" alt="{{ $hotel->name }}">
                    <p class="nazevhotelupodobrazek">{{ $hotel->name }}</p>
                    <p>{{ $hotel->location }}</p>
                    <p>
                        @for ($i = 0; $i < $hotel->rating; $i++)
                            ⭐
                        @endfor
                    </p>
                    <a href="{{ route('hotel.show', $hotel->slug) }}">View more</a>
                </div>
                @endforeach
            </div>
        </section>
    </main>
</body>

</html> 