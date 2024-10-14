@extends('dashboard.hotel.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Hotel - {{$hotel->name}}</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.hotel.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('dashboard.hotel.update', $hotel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $hotel->name) }}"
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name"
                    oninput="generateSlug()">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputSlug" class="form-label"><strong>Slug:</strong></label>
                <input 
                    type="text" 
                    name="slug" 
                    value="{{ old('slug', $hotel->slug) }}"
                    class="form-control @error('slug') is-invalid @enderror" 
                    id="inputSlug" 
                    placeholder="Slug (generated automatically)"
                    readonly>
                @error('slug')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputLocation" class="form-label"><strong>Location:</strong></label>
                <input 
                    type="text" 
                    name="location" 
                    value="{{ old('location', $hotel->location) }}"
                    class="form-control @error('location') is-invalid @enderror" 
                    id="inputLocation" 
                    placeholder="Location">
                @error('location')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRating" class="form-label"><strong>Rating:</strong></label>
                <input 
                    type="number" 
                    name="rating" 
                    value="{{ old('rating', $hotel->rating) }}"
                    class="form-control @error('rating') is-invalid @enderror" 
                    id="inputRating" 
                    placeholder="Rating (1-5)"
                    min="1" max="5">
                @error('rating')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputDescription" class="form-label"><strong>Description:</strong></label>
                <textarea 
                    class="form-control @error('description') is-invalid @enderror" 
                    style="height:150px" 
                    name="description" 
                    id="inputDescription" 
                    placeholder="Description">{{ old('description', $hotel->description) }}</textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <h3>Pokoje</h3>
            <div id="rooms">
                @foreach ($hotel->rooms as $room)
                    <div class="mb-3 room">
                        <label for="roomName" class="form-label"><strong>Room Name:</strong></label>
                        <input 
                            type="text" 
                            name="rooms[{{ $loop->index }}][name]" 
                            value="{{ old('rooms.' . $loop->index . '.name', $room->name) }}"
                            class="form-control @error('rooms.' . $loop->index . '.name') is-invalid @enderror"
                            placeholder="Room Name">
                        @error('rooms.' . $loop->index . '.name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror

                        <label for="roomCapacity" class="form-label"><strong>Capacity (1-4):</strong></label>
                        <input 
                            type="number" 
                            name="rooms[{{ $loop->index }}][capacity]" 
                            value="{{ old('rooms.' . $loop->index . '.capacity', $room->capacity) }}"
                            class="form-control @error('rooms.' . $loop->index . '.capacity') is-invalid @enderror"
                            placeholder="Capacity (1-4)" 
                            min="1" 
                            max="4">
                        @error('rooms.' . $loop->index . '.capacity')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror

                        <label for="roomPrice" class="form-label"><strong>Price per Night:</strong></label>
                        <input 
                            type="text" 
                            name="rooms[{{ $loop->index }}][price_per_night]" 
                            value="{{ old('rooms.' . $loop->index . '.price_per_night', $room->price_per_night) }}"
                            class="form-control @error('rooms.' . $loop->index . '.price_per_night') is-invalid @enderror"
                            placeholder="Price per Night">
                        @error('rooms.' . $loop->index . '.price_per_night')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>

<script>
    // Automatické generování slugu při změně názvu
    function generateSlug() {
        let name = document.getElementById('inputName').value;
        let slug = name.toLowerCase()
                       .replace(/[^a-z0-9 -]/g, '')
                       .replace(/\s+/g, '-')
                       .replace(/-+/g, '-');
        document.getElementById('inputSlug').value = slug;
    }
</script>

@endsection
