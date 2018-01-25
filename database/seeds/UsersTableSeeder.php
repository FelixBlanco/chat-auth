<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Un Usuarios Admin
    	DB::table('users')->insert([
			'name'		=> 'User Admin',
			'email'		=> 'admin@example.org',
			'password'	=> bcrypt('secret'),
	        'lat'	=> '9.7426512',
			'lng'	=> '-63.1791825',
			'rol'	=> 'admin'
    	]);

    	// Activamos 10 Users
    	factory(App\User::class, 10)->create();
    }
}
