<?php

use Illuminate\Database\Seeder;

class GymInstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GymInstructor::class, 10)->create();
    }
}
