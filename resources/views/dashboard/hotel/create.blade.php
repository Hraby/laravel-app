<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Hotel</title>
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
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
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
<x-header/>
<div class="container">
    <h2>Add New Hotel</h2>
    <div class="form-actions">
        <a class="back-button" href="{{ route('dashboard.hotel.index') }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('dashboard.hotel.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="inputName"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name') }}"
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
                value="{{ old('slug') }}"
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
                value="{{ old('location') }}"
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
                value="{{ old('rating') }}"
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
                placeholder="Enter hotel description">{{ old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <h3>Pokoje</h3>
        <div id="rooms" class="rooms-section">
            <div class="room">
                <h5>Room 1</h5>
                <div class="form-group">
                    <label for="roomName0"><strong>Room Name:</strong></label>
                    <input 
                        type="text" 
                        name="rooms[0][name]" 
                        class="@error('rooms.0.name') error @enderror"
                        id="roomName0"
                        placeholder="Enter room name">
                    @error('rooms.0.name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="roomCapacity0"><strong>Capacity (1-4):</strong></label>
                    <input 
                        type="number" 
                        name="rooms[0][capacity]" 
                        class="@error('rooms.0.capacity') error @enderror"
                        id="roomCapacity0"
                        placeholder="Enter capacity (1-4)" 
                        min="1" 
                        max="4">
                    @error('rooms.0.capacity')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="roomPrice0"><strong>Price per Night:</strong></label>
                    <input 
                        type="text" 
                        name="rooms[0][price_per_night]" 
                        class="@error('rooms.0.price_per_night') error @enderror"
                        id="roomPrice0"
                        placeholder="Enter price per night">
                    @error('rooms.0.price_per_night')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="submit-button">Add Hotel</button>
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