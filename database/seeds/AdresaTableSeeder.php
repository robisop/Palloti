<?php

use Illuminate\Database\Seeder;

class AdresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Adresa::class, 50)->create();
    }
}
