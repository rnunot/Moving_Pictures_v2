<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create(array(
        'first_name'        => $faker->name,
        'last_name'         => $faker->name,
				'birthdate'         => $faker->date,
				'email'             => $faker->email,
				'username'          => $faker->username,
				'password'          => 'foo_bar_1234',
				'confirmation_code' => md5(uniqid(mt_rand(), true))
			));
		}
	}

}