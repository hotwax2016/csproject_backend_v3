<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'role' => $faker->randomElement($array = array ('tourist', 'guide')),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'bio' => $faker->paragraph,
        'title' => $faker->title,
        'gender' => $faker->randomElement($array = array('male', 'female')),
        'dp_url' => 'https://i.pravatar.cc/300/?u=' . hash('md5', $faker->unique()->safeEmail),
        'contact_no' => $faker->tollFreePhoneNumber,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'passport_id' => $faker->isbn10,
        'nic' => $faker->isbn10,
        'address' => $faker->address,
        'lang_primary' => $faker->languageCode,
        'country' => $faker->countryCode,
        'remember_token' => Str::random(10),
    ];
});

