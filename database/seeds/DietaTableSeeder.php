<?php

use Illuminate\Database\Seeder;

class DietaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dieta::class, 50)->create();
    }
}
