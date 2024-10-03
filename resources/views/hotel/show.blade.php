<!-- resources/views/hotel/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name }}</title>
</head>
<body>
    <header>
        <h1>{{ $hotel->name }}</h1>
    </header>

    <section>
        <h2>Details</h2>
        <p><strong>Location:</strong> {{ $hotel->location }}</p>
        <p><strong>Description:</strong> {{ $hotel->description }}</p>
        <p><strong>Rating:</strong> {{ $hotel->rating }} / 5</p>
    </section>

    <section>
        <h2>Rooms</h2>
        <ul>
            @foreach($hotel->rooms as $room)
                <li>
                    <strong>{{ $room->name }}</strong>: {{ $room->description }} - {{ $room->price }} CZK per night
                </li>
            @endforeach
        </ul>
    </section>

    <footer>
        <p><a href="{{ route('home') }}">Back to Home</a></p>
    </footer>
</body>
</html>