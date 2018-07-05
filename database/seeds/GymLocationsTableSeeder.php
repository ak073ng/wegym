<?php

use Illuminate\Database\Seeder;

class GymLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GymLocation::class, 10)->create();
    }
}
