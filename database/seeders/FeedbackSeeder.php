<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create();

        $data = [];

        for($i=0; $i<11; $i++) {
            $data[] = [
                'news_id' => 1,
                'name' => $faker->firstName() . " " . $faker->lastName(),
                'message' => $faker->text(mt_rand(10,300))
            ];
        }
        return $data;

    }
}
