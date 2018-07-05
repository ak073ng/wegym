<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GymLocationsTableSeeder::class);
        $this->call(GymInstructorsTableSeeder::class);
        $this->call(WorkoutsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
