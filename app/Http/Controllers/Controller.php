<?php

namespace App\Http\Controllers;

use Carbon\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(?int $id = null): array
    {
        $faker = \Faker\Factory::create();
        $statusList = ["DRAFT","ACTIVE","BLOCKED"];

        if($id){
            return [
                'id'    => $id,
                'categoryId' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250,150),
                'status' => $statusList[mt_rand(0,2)],
                'description' => $faker->text(100)
            ];
        }

        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'id'    => $faker->randomDigitNotZero(10),
                'categoryId' => $faker->randomDigitNotZero(10),
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250,150),
                'status' => $statusList[mt_rand(0,2)],
                'description' => "<strong>" . $faker->text(100) . "</strong>"
            ];
        }
        return $data;
    }

    public function getCategoryNews():array
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'categoryId' => $i + 1,
                'categoryName' => $faker->jobTitle()
            ];
        }

        return $data;
    }
}
