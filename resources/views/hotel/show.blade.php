<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - {{ $hotel->name }}</title>
    
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
            max-width: 1400px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 3px solid #019a97;
            margin-top: 80px;
        }

        .hotel-main {
            margin-bottom: 20px;
        }

        .hotel-name {
            font-size: 35px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hotel-desc {
            font-size: 18px;
            color: #666;
            margin-bottom: 25px;
        }

        .hotel-body {
            display: flex;
            gap: 20px;
        }

        .left {
            flex: 1;
        }

        .left img {
            width: 100%;
            border-radius: 8px;
            object-fit: cover;
            cursor: pointer;
        }

        .right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .reservation-form {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .reservation-form h3 {
            margin-bottom: 15px;
            font-size: 20px;
            font-weight: 500;
        }

        .reservation-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .reservation-form input,
        .reservation-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .reservation-form button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: black;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            width: 100%;
        }

        .reservation-form button:hover {
            background-color: #019a97;
        }

        .login-message {
            background-color: #ffeb3b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #333;
            margin-top: 500px;
            margin-left: -103%;
            text-align: center;
            margin-bottom: -10px;
        }

        .hotel-hodnoceni{
            margin-top: 10px !important;
        }

        .log-in-text{
            font-weight: bold;
            color: black;
            text-decoration: underline 1px solid black !important;
        }
        
        .log-in-text:hover {
            color: black;
            opacity: 0.8;
        }

        .locationbutton{
            padding: 8px;
            border-radius: 5px;
            background-color: transparent;
            color: black;
            font-size: 16px;
            /* cursor: pointer; */
            transition: background-color 0.3s ease;
            text-align: left;
            width: 100%;
            border: 1px solid lightgray;
        }

        #personodskok{
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <x-header />

    <main>
        <div class="hotel-main">
            <a href="/hotel" style="cursor: pointer; color: #019a97; text-decoration: none">← back</a>
            <h2 class="hotel-name">{{ $hotel->name }}</h2>
            <div class="hotel-desc">
                <p class="hotel-location">{{ $hotel->location }}</p>
                <p class="hotel-hodnoceni">
                    @for ($i = 0; $i < $hotel->rating; $i++)
                        ⭐
                    @endfor
                </p>
                <p>${{ $hotel->price }}/person</p>
            </div>
            <div class="hotel-body">
                <div class="left">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/8a/e0/b9/bellagio-las-vegas.jpg?w=1200&h=-1&s=1" alt="{{ $hotel->name }}">
                </div>
                <div class="right">
                    @if(Auth::check())
                        <div class="reservation-form">
                            <form action="{{ route('reservation.store', $hotel->id) }}" method="POST" id="reservationForm">
                                @csrf
                            
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                                <label for="guests">Hotel Name:</label>
                                <div class="locationbutton">{{ $hotel->name }}</div>

                                <label id="personodskok" for="guests">Guests:</label>
                                <input type="number" name="guests" id="guests" value="1" required min="1" onchange="updateTotalPrice()">
                            
                                <label for="check_in">Check-in:</label>
                                <input type="date" name="check_in" id="check_in" required>
                            
                                <label for="check_out">Check-out:</label>
                                <input type="date" name="check_out" id="check_out" required>

                                <label for="price">Total Price:</label>
                                <input type="hidden" name="price" id="price" value="{{ $hotel->price }}">
                                <input type="text" id="total_price" value="{{ $hotel->price }}" readonly>

                                <button type="submit">Reserve</button>
                            </form>                            
                        </div>
                    @else
                        <div class="login-message">
                        To make a reservation you need to <a href="{{ route('login') }}"><text class="log-in-text">LOG IN</text></a> or <a href="{{ route('register') }}"><text class="log-in-text">REGISTRATION</text></a> !
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script>
        function updateTotalPrice() {
            const pricePerPerson = {{ $hotel->price }};
            const guests = document.getElementById('guests').value;
            const totalPrice = pricePerPerson * guests;
            document.getElementById('price').value = totalPrice.toFixed(2);
            document.getElementById('total_price').value = totalPrice.toFixed(2);
        }

        function setMinMaxDates() {
            const today = new Date();
            const tomorrow = new Date();
            tomorrow.setDate(today.getDate() + 1);
            
            const maxDate = new Date();
            maxDate.setDate(today.getDate() + 180);

            const formatDate = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            };

            document.getElementById('check_in').setAttribute('min', formatDate(tomorrow));
            document.getElementById('check_in').setAttribute('max', formatDate(maxDate));
            document.getElementById('check_out').setAttribute('min', formatDate(tomorrow));
            document.getElementById('check_out').setAttribute('max', formatDate(maxDate));
        }

        // Inicializace
        document.addEventListener("DOMContentLoaded", function() {
            setMinMaxDates(); // Nastavení min/max dat
            updateTotalPrice(); // Inicializace ceny
        });
    </script>
</body>

</html>