<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('email_templates')->insert([
        //     'title' => str_random(10),
        //     'subject' => str_random(10),
        //     'from' => str_random(10).'@gmail.com',
        //     'description' => str_random(10),
        //     'status' => 1,
            
        // ]);
        $faker = Faker\Factory::create();

        $limit = 400;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('email_templates')->insert([ //,
                'title' => $faker->title,
                'subject' => $faker->title,
                'from' => $faker->unique()->email,
                'description' => $faker->title,
                'status' => 1,
            ]);
        }
    }
}
