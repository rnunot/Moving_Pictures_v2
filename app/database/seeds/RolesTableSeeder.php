<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class RolesTableSeeder extends Seeder {

	public function run()
	{

    Role::create(array(
      'name'  => "Admin"
    ));
	}

}