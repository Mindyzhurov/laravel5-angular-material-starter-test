<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
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
    	$min = App\Activity::min('id');
        $max = App\Activity::max('id');

        $problems = [
        	'What is CORS? How does it work?',
        	'Explain the purpose of each of the HTTP request types when used with a RESTful web service.',
        	'Explain the basic structure of a MIME multipart message when used to transfer .',
            'Consider the following JavaScript code that is executed in a browser:',
            'What is an ETag and how does it work?',
            'Describe the key advantages of HTTP/2 as compared with HTTP 1.1.',
            'What is a “MIME type”, what does it consist of, and what is it used for?'
        ];

        foreach($problems as $problem) {
        	DB::table('questions')->insert([
        			'activity_id' => $faker->numberBetween($min, $max),
        			'problem' => $problem
        		]);        	
        }
    }
}
