<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card-body">
                        <p>This is your dashboard. You can manage your hotels, view bookings, and more.</p>
            
                        <a href="{{ route('dashboard.hotel.index') }}" class="btn btn-primary">Manage Hotels</a>
                        <a href="{{ route('dashboard.reservations.index') }}" class="btn btn-primary">Manage Reservations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
