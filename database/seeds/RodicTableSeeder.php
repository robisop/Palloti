<?php

use Illuminate\Database\Seeder;

class RodicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Rodic::class, 50)->create();

        for ($i = 0; $i < 50; $i++) {
            $faker = Faker\Factory::create();
            DB::table('dieta_rodic')->insert([
                'id_dieta' => $faker->numberBetween(1, 50),
                'id_rodic' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
