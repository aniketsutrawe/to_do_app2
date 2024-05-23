<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tasks;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1; $i<=10;$i++){

            $faker = Faker::create();
            $tasks = new Tasks;
            $tasks-> heading = $faker->name;
            $tasks-> discription =implode(' ', $faker->words(random_int(2,10)));

            $startDate = '2023-12-01'; // Start date is one year ago from the current date
            $endDate = 'now'; // End date is the current date
            $randomDate = $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d H:i:s');
            $tasks->updated_at = $randomDate;
            
            $tasks-> save();
        }
    }
}
