<main>
    <h1 class="text-2xl font-bold pb-4">Hotely</h1>
    <div class="hotel-list grid grid-cols-2 gap-4">
        @foreach($hotels as $hotel)
            <x-hotel-card :hotel="$hotel" />
        @endforeach
    </div>                   
</main>