<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(CiselnikySeeder::class);
        $this->call(AdresaTableSeeder::class);
        $this->call(DietaTableSeeder::class);
        $this->call(PrekladatelTableSeeder::class);
        $this->call(RodicTableSeeder::class);

        Model::reguard();
    }
}
