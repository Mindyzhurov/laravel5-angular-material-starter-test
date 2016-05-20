<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ActivitySeeder extends Seeder
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

        foreach (range(1,5) as $index) {
	        DB::table('activities')->insert([
	            'name' => 'Activity '.$index,
	            'description' => str_random(50)	            
	        ]);
        }
    }
}
    