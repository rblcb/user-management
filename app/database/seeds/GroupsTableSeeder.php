<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			Group::create([
                'name' => $faker->word
            ]);;
		}

        $group1 = Group::find(1);
        $group2 = Group::find(2);

        $user = User::where('username','=','admin')->first();
        $user->groups()->attach($group1);
        $user->groups()->attach($group2);

	}

}