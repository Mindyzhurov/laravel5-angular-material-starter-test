<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ThemeSeeder extends Seeder
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
        $activities = App\Activity::all();

        $i = 0;
        foreach ($activities as $value) {
        	DB::table('themes')->insert([
        		'name' => 'Themes1',
        		'startat' => date('Y-m-d'),
        		'groupid' => $faker->numberBetween($min, $max),
        		'activity_id' => $value->id
        	]);
        }
    }
}
