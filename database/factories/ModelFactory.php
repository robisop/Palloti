<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Rodic::class, function (Faker\Generator $faker) {
    $datum_registracie = Carbon::instance($faker->dateTimeThisDecade);
    return [
        'nazov_spolocnosti' => $faker->company,
        'oslovenie' => $faker->title,
        'meno' => $faker->firstName,
        'priezvisko' => $faker->lastName,
        'email' => $faker->email,
        'telefon' => $faker->phoneNumber,
        'telefon2' => $faker->phoneNumber,
        'iban' => 'SK0200' . $faker->randomNumber(5, true) . $faker->randomNumber(5, true),
        'vs' => $datum_registracie->year . str_pad($datum_registracie->month, 2, '0', STR_PAD_LEFT) . $faker->randomNumber(4, true),
        'id_adresa' => $faker->numberBetween(1, 50),
        'poznamka' => $faker->text,
        'id_rodic_stav' => $faker->numberBetween(1, 6),
        'id_sposob_komunikacie' => $faker->numberBetween(1, 4),
        'datum_podpisu_zmluvy' => $datum_registracie,
        'datum_ukoncenia_zmluvy' => $datum_registracie->addYear(),
        'posielat_casopis' => $faker->boolean(),
        'posielat_podakovania' => $faker->boolean(),
        'je_institucia' => $faker->boolean(),
    ];
});

$factory->define(App\Dieta::class, function (Faker\Generator $faker) {
    return [
        'meno' => $faker->firstName,
        'priezvisko' => $faker->lastName,
        'pohlavie' => $faker->randomElement(['M', 'Z']),
        'datum_narodenia' => $faker->dateTimeThisDecade,
        'rok_narodenia' => $faker->dateTimeThisDecade->format('Y'),
        'id_rodinny_stav' => $faker->numberBetween(1, 3),
        'id_skola' => $faker->numberBetween(1, 4),
        'skola_datum_nastavenia' => $faker->dateTimeThisDecade,
        'prekladat_list' => $faker->boolean(),
        'id_misia' => $faker->numberBetween(1, 5),
        'kod' => strtoupper($faker->randomLetter)
            . strtoupper($faker->randomLetter)
            . $faker->randomNumber(6, true),
        'poznamka' => $faker->text,
        'id_dieta_stav' => $faker->numberBetween(1, 4),
        'dovod_ukoncenia' => $faker->text(50),
        'datum_pozastavene_do' => $faker->dateTimeThisDecade,
    ];
});

$factory->define(App\Adresa::class, function (Faker\Generator $faker) {
    return [
        'oslovenie' => $faker->title,
        'meno' => $faker->firstName . ' ' . $faker->lastName,
        'nazov_spolocnosti' => $faker->company,
        'ulica' => $faker->streetAddress,
        'mesto' => $faker->city,
        'psc' => $faker->postcode,
        'id_krajina' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(App\Prekladatel::class, function (Faker\Generator $faker) {
    return [
        'meno' => $faker->firstName,
        'priezvisko' => $faker->lastName,
        'email' => $faker->email,
        'telefon' => $faker->phoneNumber,
        'id_sposob_dorucenia' => $faker->numberBetween(1, 2),
        'id_adresa' => $faker->numberBetween(1, 50),
        'poznamka' => $faker->text,
        'id_prekladatel_stav' => $faker->numberBetween(1, 3),
    ];
});