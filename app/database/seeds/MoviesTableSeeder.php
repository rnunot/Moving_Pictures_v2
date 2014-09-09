<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Movie::create([
				'title' => $faker->sentence(5),
				'imdb_link' => $faker->imageUrl($width = 200, $height = 300),
	            'duration' => $faker->time,
	            'director' => $faker->name,
	            'genre' => $faker->word,
	            'image' => $faker->imageUrl($width = 200, $height = 300)
			]);
		}
	}

}