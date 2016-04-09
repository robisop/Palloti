<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CiselnikySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dieta_stav
        DB::table('dieta_stav')->insert(['nazov' => 'aktivne', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('dieta_stav')->insert(['nazov' => 'ukoncene', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('dieta_stav')->insert(['nazov' => 'pozastavene', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('dieta_stav')->insert(['nazov' => 'zomrele', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //prekladatel_stav
        DB::table('prekladatel_stav')->insert(['nazov' => 'aktivny', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('prekladatel_stav')->insert(['nazov' => 'pasivny', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('prekladatel_stav')->insert(['nazov' => 'pozastaveny', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //rodinny_stav
        DB::table('rodinny_stav')->insert(['nazov' => 'rodina', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodinny_stav')->insert(['nazov' => 'sirota', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodinny_stav')->insert(['nazov' => 'polosirota', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //skola
        DB::table('skola')->insert(['nazov' => 'ziadna', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('skola')->insert(['nazov' => 'zakladna skola', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('skola')->insert(['nazov' => 'stredna skola', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('skola')->insert(['nazov' => 'vysoka skola', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //jazyk
        DB::table('jazyk')->insert(['nazov' => 'anglicky', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('jazyk')->insert(['nazov' => 'francuzsky', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('jazyk')->insert(['nazov' => 'nemecky', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('jazyk')->insert(['nazov' => 'slovensky', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('jazyk')->insert(['nazov' => 'spanielsky', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //krajina
        DB::table('krajina')->insert(['nazov' => 'Egypt', 'kod' => 'EG', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('krajina')->insert(['nazov' => 'Juhoafricka republika', 'kod' => 'ZA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('krajina')->insert(['nazov' => 'Kamerun', 'kod' => 'CM', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('krajina')->insert(['nazov' => 'Libia', 'kod' => 'LY', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('krajina')->insert(['nazov' => 'Somalsko', 'kod' => 'SO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);


        //misia
        DB::table('misia')->insert(['nazov' => 'Misia Matky Terezy', 'kod' => '01', 'id_krajina' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('misia')->insert(['nazov' => 'Misia sv. Vincenta de Paul', 'kod' => '02', 'id_krajina' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('misia')->insert(['nazov' => 'Kapucini', 'kod' => '33', 'id_krajina' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('misia')->insert(['nazov' => 'Samaritan', 'kod' => '44', 'id_krajina' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('misia')->insert(['nazov' => 'Deti v nudzi', 'kod' => '77', 'id_krajina' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //sposob_dorucenia
        DB::table('sposob_dorucenia')->insert(['nazov' => 'email', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sposob_dorucenia')->insert(['nazov' => 'posta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //rodic_stav
        DB::table('rodic_stav')->insert(['nazov' => 'registruje sa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodic_stav')->insert(['nazov' => 'adopcia', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodic_stav')->insert(['nazov' => 'vseobecne', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodic_stav')->insert(['nazov' => 'zomrel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodic_stav')->insert(['nazov' => 'skoncil', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('rodic_stav')->insert(['nazov' => 'nekompletne udaje (anonym)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //sposob_komunikacie
        DB::table('sposob_komunikacie')->insert(['nazov' => 'ziadna', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sposob_komunikacie')->insert(['nazov' => 'len email', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sposob_komunikacie')->insert(['nazov' => 'len posta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sposob_komunikacie')->insert(['nazov' => 'email aj posta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //list_stav
        DB::table('sprava_stav')->insert(['nazov' => 'prisiel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sprava_stav')->insert(['nazov' => 'poslany prekladatelovi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sprava_stav')->insert(['nazov' => 'prisiel prelozena', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sprava_stav')->insert(['nazov' => 'poslany rodicovi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //list_typ
        DB::table('sprava_typ')->insert(['nazov' => 'dieta rodicovi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('sprava_typ')->insert(['nazov' => 'rodic dietatu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //projekt_stav
        DB::table('projekt_stav')->insert(['nazov' => 'otvoreny', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('projekt_stav')->insert(['nazov' => 'odisli peniaze', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('projekt_stav')->insert(['nazov' => 'peniaze v afrike', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('projekt_stav')->insert(['nazov' => 'ukonceny projekt', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //poziadavka_stav
        DB::table('poziadavka_stav')->insert(['nazov' => 'odoslana', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('poziadavka_stav')->insert(['nazov' => 'prisla odpoved', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        //poziadavka_typ
        DB::table('poziadavka_typ')->insert(['nazov' => 'ziadost o fotku', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('poziadavka_typ')->insert(['nazov' => 'formular', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('poziadavka_typ')->insert(['nazov' => 'ina', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
