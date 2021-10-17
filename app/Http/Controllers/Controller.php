<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $news = [
        [
            'id' => 0,
            'title' => 'New #1',
            'author' => '',
            'image' => null,
            'description' => ''
        ]
    ];

    protected array $categoryNews =
        [
            '0' => 'Политика',
            '1' => 'Наука и техника',
            '2' => 'Культура',
            '3' => 'Медицина',
            '4' => 'Прогноз погоды'
        ];

    public function getNews(): array
    {
//        return [];
        $faker = Factory::create();
        $data = [];
        for($i=0; $i<9;$i++) {
            $data[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => null,
                'description' => $faker->sentence(10)
            ];
        }
        return $data;
    }

    public function getCategoryNews(): array
    {
        return $this->categoryNews;
    }

}
