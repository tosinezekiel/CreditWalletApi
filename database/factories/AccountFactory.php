<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
	$gender = $faker->randomElement(['male', 'female']);
    return [
        'amount' => '1,500,000', 
        'duration' => '11 months',
        'title' => $faker->randomElement(['male', 'female']), 
        'gender' => $gender, 
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'dob' => '27-05-1988',
        'phone' => '$faker->phoneNumber', 
        'email' => $faker->unique()->safeEmail,
        'address' => '33, test street',
        'city' => 'ikeja',
        'state' => 'lagos',
        'employer_name' => $faker->company,
        'ippis_no' => $faker->ean13,
        'salary_bank_name' => 'Access Bank',
        'salary_account_number' => $faker->isbn10,
    ];
});
