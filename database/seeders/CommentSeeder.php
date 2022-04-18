<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for($i = 0; $i < 20; $i++){
            $data[] = [
                'news_id' => $faker->randomDigitNotZero(10),
                'name' => $faker->userName(),
                'is_active' => $faker->randomKey([0,1]),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
}
