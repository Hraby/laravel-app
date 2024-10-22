<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel - {{$hotel->name}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            width: 100%;
            margin: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
            padding: 5px;
        }
        .form-group input.error, .form-group textarea.error {
            border-color: red;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
        .form-actions {
            margin-bottom: 20px;
        }
        .back-button {
            background-color: #4CAF87;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .submit-button {
            background-color: #019A97;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .rooms-section {
            margin-top: 20px;
        }
        .room {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        .room h5 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <x:header/>

<div class="container">
    <h2>Edit Hotel - {{$hotel->name}}</h2>
    <div class="form-actions">
        <a class="back-button" href="{{ route('dashboard.hotel.index') }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('dashboard.hotel.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="inputName"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name', $hotel->name) }}"
                class="@error('name') error @enderror" 
                id="inputName" 
                placeholder="Enter hotel name"
                oninput="generateSlug()">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputSlug"><strong>Slug:</strong></label>
            <input 
                type="text" 
                name="slug" 
                value="{{ old('slug', $hotel->slug) }}"
                class="@error('slug') error @enderror" 
                id="inputSlug" 
                placeholder="Generated slug" 
                readonly>
            @error('slug')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputLocation"><strong>Location:</strong></label>
            <input 
                type="text" 
                name="location" 
                value="{{ old('location', $hotel->location) }}"
                class="@error('location') error @enderror" 
                id="inputLocation" 
                placeholder="Enter location">
            @error('location')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputRating"><strong>Rating:</strong></label>
            <input 
                type="number" 
                name="rating" 
                value="{{ old('rating', $hotel->rating) }}"
                class="@error('rating') error @enderror" 
                id="inputRating" 
                placeholder="Rating (1-5)"
                min="1" max="5">
            @error('rating')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputDescription"><strong>Description:</strong></label>
            <textarea 
                class="@error('description') error @enderror" 
                name="description" 
                id="inputDescription" 
                placeholder="Enter hotel description">{{ old('description', $hotel->description) }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <h3>Pokoje</h3>
        <div id="rooms" class="rooms-section">
            @foreach ($hotel->rooms as $room)
                <div class="room">
                    <h5>Room {{$loop->index + 1}}</h5>
                    <div class="form-group">
                        <label for="roomName{{$loop->index}}"><strong>Room Name:</strong></label>
                        <input 
                            type="text" 
                            name="rooms[{{ $loop->index }}][name]" 
                            value="{{ old('rooms.' . $loop->index . '.name', $room->name) }}"
                            class="@error('rooms.' . $loop->index . '.name') error @enderror"
                            id="roomName{{$loop->index}}"
                            placeholder="Enter room name">
                        @error('rooms.' . $loop->index . '.name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="roomCapacity{{$loop->index}}"><strong>Capacity (1-4):</strong></label>
                        <input 
                            type="number" 
                            name="rooms[{{ $loop->index }}][capacity]" 
                            value="{{ old('rooms.' . $loop->index . '.capacity', $room->capacity) }}"
                            class="@error('rooms.' . $loop->index . '.capacity') error @enderror"
                            id="roomCapacity{{$loop->index}}"
                            placeholder="Enter capacity (1-4)" 
                            min="1" 
                            max="4">
                        @error('rooms.' . $loop->index . '.capacity')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="roomPrice{{$loop->index}}"><strong>Price per Night:</strong></label>
                        <input 
                            type="text" 
                            name="rooms[{{ $loop->index }}][price_per_night]" 
                            value="{{ old('rooms.' . $loop->index . '.price_per_night', $room->price_per_night) }}"
                            class="@error('rooms.' . $loop->index . '.price_per_night') error @enderror"
                            id="roomPrice{{$loop->index}}"
                            placeholder="Enter price per night">
                        @error('rooms.' . $loop->index . '.price_per_night')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="submit-button">Update Hotel</button>
    </form>
</div>

<script>
    function generateSlug() {
        let name = document.getElementById('inputName').value;
        let slug = name.toLowerCase()
                       .replace(/[^a-z0-9 -]/g, '')
                       .replace(/\s+/g, '-')
                       .replace(/-+/g, '-');
        document.getElementById('inputSlug').value = slug;
    }
</script>

</body>
</html>