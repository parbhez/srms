<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

        	'full_name'=>'saiful Islam',
        	'user_name'=>'saiful',
        	'email'=>'saiful.affb@gmail.com',
        	'password'=>bcrypt('saiful'),
        	'remember_token'=>str_random(10),
        	'address'=>'feni',
        	'contact'=>'01674855871',
        	'status'=>1
        ]);
    }
}
