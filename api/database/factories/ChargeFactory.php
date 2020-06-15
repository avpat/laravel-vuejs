<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Charge;
use Faker\Generator as Faker;

$factory->define(Charge::class, function (Faker $faker) {

    $randomDay = rand(1, 30);

    return [
        'unit_id'   => factory(App\Unit::class),
        'start'     => \Carbon\Carbon::now()->addDays($randomDay)->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60)),
        'end'       => \Carbon\Carbon::now()->addDays(rand($randomDay + 1, 0))->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60)),
    ];
});
