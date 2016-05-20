<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
