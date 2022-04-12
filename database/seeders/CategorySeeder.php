<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());

    }

    private function getData(): array
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
}
