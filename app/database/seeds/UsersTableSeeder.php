<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

    User::create(array(
      'first_name'            => "Ricardo",
      'last_name'             => "Tavares",
      'birthdate'             => $faker->date,
      'email'                 => "rnunot@gmail.com",
      'username'              => "rnunot",
      'password'              => 'foo_bar_1234',
      'password_confirmation' => 'foo_bar_1234',
      'confirmation_code'     => md5(uniqid(mt_rand(), true))
    ));

		foreach(range(1, 10) as $index)
		{
			User::create(array(
        'first_name'            => $faker->firstName(),
        'last_name'             => $faker->lastName,
				'birthdate'             => $faker->date,
				'email'                 => $faker->email,
				'username'              => $faker->username,
				'password'              => 'foo_bar_1234',
        'password_confirmation' => 'foo_bar_1234',
				'confirmation_code'     => md5(uniqid(mt_rand(), true))
			));
		}
	}

}