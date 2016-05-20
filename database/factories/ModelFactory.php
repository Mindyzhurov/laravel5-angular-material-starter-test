<?php

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
    $min = App\Group::min('id');
    $max = App\Group::max('id');

    return [
        'name'  => $faker->name,
        'email' => $faker->safeEmail,        
        'password' => str_random(10),
        'is_admin' => 2,
        'groupid' => $faker->numberBetween($min. $max)
    ];
});

$factory->define(App\PasswordReset::class, function (Faker\Generator $faker) {
    return [
        'email'  => $faker->safeEmail,
        'token' => str_random(10),
    ];
});

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {
    $ret = [];
    for($i = 0; $i < 10; $i ++){
        array_push($ret, [
            'name' => str_random(10),
            'icon' => '/img/icons/ic_reorder_black_24px.svg',
            'number' => $faker->randomDigit
        ]);
    }

    return $ret;    
});

$factory->define(App\Theme::class, function (Faker\Generator $faker) {
    $min = App\Activity::min('id');
    $max = App\Activity::max('id');

    $gmin = App\Group::min('id');
    $gmax = App\Group::max('id');

    return [
        'name' => str_random(10),
        'date' => date('Y-m-d'),
        'groupid' => $faker->numberBetween($gmin, $gmax),
        'activit_id' => $faker->numberBetween($min, $max)
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {

    $min = App\Activity::min('id');
    $max = App\Activity::max('id');    

    $activity_id = $faker->numberBetween($min, $max);
    $ret = [];

    for($i =0 ; $i < 10; $i++) {
        array_push($ret, [
                'title' => str_random(10),
                'activit_id' => $activit_id,
                'problem' => str_random(100)
            ]);
    }

    return $ret;
});






