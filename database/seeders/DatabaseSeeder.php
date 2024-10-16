<?php
namespace Database\Seeders;

    use App\Models\User;
    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            $this->call(AdminSeeder::class);

            \App\Models\Hotel::factory(10)->hasRooms(5)->create();

            \App\Models\Booking::factory(30)->create();
        }
    }
