<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $min = App\Group::min('id');
        $max = App\Group::max('id');
        DB::table('users')->insert([
	            'name' => 'admin',
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	            'groupid' => $faker->numberBetween($min, $max),
	            'is_admin' => 2
	        ]);
    }
}
