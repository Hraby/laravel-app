@extends('dashboard.hotel.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Hotel</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.hotel.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('dashboard.hotel.store') }}" method="POST"> 
            @csrf

            <!-- Hotel Name -->
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Hotel Name"
                    oninput="generateSlug()">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label for="inputSlug" class="form-label"><strong>Slug:</strong></label>
                <input 
                    type="text" 
                    name="slug" 
                    class="form-control @error('slug') is-invalid @enderror" 
                    id="inputSlug" 
                    placeholder="Slug (generated automatically)"
                    readonly>
                @error('slug')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="inputLocation" class="form-label"><strong>Location:</strong></label>
                <input 
                    type="text" 
                    name="location" 
                    class="form-control @error('location') is-invalid @enderror" 
                    id="inputLocation" 
                    placeholder="Hotel Location">
                @error('location')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <label for="inputRating" class="form-label"><strong>Rating:</strong></label>
                <input 
                    type="number" 
                    name="rating" 
                    class="form-control @error('rating') is-invalid @enderror" 
                    id="inputRating" 
                    placeholder="Rating (1-5)"
                    min="1" max="5">
                @error('rating')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="inputDescription" class="form-label"><strong>Description:</strong></label>
                <textarea 
                    class="form-control @error('description') is-invalid @enderror" 
                    style="height:150px" 
                    name="description" 
                    id="inputDescription" 
                    placeholder="Description"></textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Rooms Section -->
            <h3>Pokoje</h3>
            <div id="rooms">
                <!-- Default Room Input if Hotel has No Rooms Yet -->
                <div class="mb-3 room" data-index="0">
                    <label for="roomName" class="form-label"><strong>Room Name:</strong></label>
                    <input 
                        type="text" 
                        name="rooms[0][name]" 
                        class="form-control @error('rooms.0.name') is-invalid @enderror"
                        placeholder="Room Name">
                    @error('rooms.0.name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror

                    <label for="roomCapacity" class="form-label"><strong>Capacity (1-4):</strong></label>
                    <input 
                        type="number" 
                        name="rooms[0][capacity]" 
                        class="form-control @error('rooms.0.capacity') is-invalid @enderror"
                        placeholder="Capacity (1-4)" 
                        min="1" max="4">
                    @error('rooms.0.capacity')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror

                    <label for="roomPrice" class="form-label"><strong>Price per Night:</strong></label>
                    <input 
                        type="text" 
                        name="rooms[0][price_per_night]" 
                        class="form-control @error('rooms.0.price_per_night') is-invalid @enderror"
                        placeholder="Price per Night">
                    @error('rooms.0.price_per_night')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Add New Room Button -->
            <button type="button" class="btn btn-info mb-3" id="addRoomBtn"><i class="fa fa-plus"></i> Add Room</button>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save Hotel</button>
        </form>

    </div>
</div>

<script>
    // Automatické generování slugu při změně názvu
    function generateSlug() {
        let name = document.getElementById('inputName').value;
        let slug = name.toLowerCase()
                       .replace(/[^a-z0-9 -]/g, '')     // odstraní speciální znaky
                       .replace(/\s+/g, '-')             // nahrazuje mezery pomlčkami
                       .replace(/-+/g, '-');             // zamezí více pomlčkám za sebou
        document.getElementById('inputSlug').value = slug;
    }

    // Dynamicky přidat nové pokoje
    document.getElementById('addRoomBtn').addEventListener('click', function () {
        let roomIndex = document.querySelectorAll('.room').length;
        let roomHTML = `
            <div class="mb-3 room" data-index="${roomIndex}">
                <label for="roomName" class="form-label"><strong>Room Name:</strong></label>
                <input 
                    type="text" 
                    name="rooms[${roomIndex}][name]" 
                    class="form-control" 
                    placeholder="Room Name">
                
                <label for="roomCapacity" class="form-label"><strong>Capacity (1-4):</strong></label>
                <input 
                    type="number" 
                    name="rooms[${roomIndex}][capacity]" 
                    class="form-control" 
                    placeholder="Capacity (1-4)" 
                    min="1" max="4">
                
                <label for="roomPrice" class="form-label"><strong>Price per Night:</strong></label>
                <input 
                    type="text" 
                    name="rooms[${roomIndex}][price_per_night]" 
                    class="form-control" 
                    placeholder="Price per Night">
                
                <button type="button" class="btn btn-danger btn-sm remove-room-btn" onclick="removeRoom(this)">Remove Room</button>
            </div>
        `;
        document.getElementById('rooms').insertAdjacentHTML('beforeend', roomHTML);
    });

    // Odstranit pokoj
    function removeRoom(button) {
        let roomDiv = button.closest('.room');
        roomDiv.remove();
    }
</script>

@endsection
