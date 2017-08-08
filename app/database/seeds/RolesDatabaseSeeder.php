<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $userRole = new Role;
        $userRole->name = 'user';
        $userRole->save();

        $user = User::where('username','=','admin')->first();
        $user->roles()->attach($adminRole);

        $regularUsers = User::where('username','!=','user')->get();
        foreach($regularUsers as $regulatUser){
            $regulatUser->roles( $userRole );
            $regulatUser->roles()->attach($userRole);
        }
    }
}