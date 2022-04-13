<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'name' => $faker->jobTitle(),
                'url' => $faker->url(),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }

}
