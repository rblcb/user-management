<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        User::create([
            'fullname' => 'Boris',
            'username' => 'admin',
            'email' => 'boro_mo@hotmail.com',
            'password' => Hash::make('secret')
        ]);

		foreach(range(1, 10) as $index)
		{
			User::create([
                'fullname' => $faker->word,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('secret')
			]);
		}
	}

}