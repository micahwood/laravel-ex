<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
    DB::table('users')->delete();
    $user = new User();
    $user->name = 'jinawina';
    $user->password = Hash::make('password');
    $user->save();
	}

}