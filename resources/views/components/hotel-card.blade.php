<!-- resources/views/components/hotel-card.blade.php -->

<div class="hotel-card">
    <h2>{{ $hotel->name }}</h2>
    <p><strong>Location:</strong> {{ $hotel->location }}</p>
    <p><strong>Description:</strong> {{ $hotel->description }}</p>
    <p><strong>Rating:</strong> {{ $hotel->rating }} / 5</p>

    <a href="{{ route('hotel.show', $hotel->slug) }}">View Details</a>
</div>