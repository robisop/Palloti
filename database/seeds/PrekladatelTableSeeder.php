<?php

use Illuminate\Database\Seeder;

class PrekladatelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Prekladatel::class, 50)->create();

        for ($i = 0; $i < 50; $i++) {
            $faker = Faker\Factory::create();
            DB::table('jazyk_prekladatel')->insert([
                'id_jazyk' => $faker->numberBetween(1, 5),
                'id_prekladatel' => $faker->numberBetween(1, 50),
            ]);
        }

    }
}
