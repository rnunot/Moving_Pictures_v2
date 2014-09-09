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
				'name' => $faker->name,
				'birthdate' => $faker->date,
				'email' => $faker->email,
				'login' => $faker->username,
				'password' => $index,
				'activation_string' => $index,
				'status' => '1'
			));
		}
	}

}