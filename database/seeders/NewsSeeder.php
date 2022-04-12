<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'category_id' => $faker->randomDigitNotZero(10),
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'ACTIVE',
                'image' => $faker->imageUrl(250,150),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }

}
