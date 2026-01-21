<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train; // Importante: Importa il Model!
use Faker\Generator as Faker; // Importa Faker

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Generiamo 20 treni
        for ($i = 0; $i < 20; $i++) {
            $train = new Train();
            
            $train->company = $faker->randomElement(['Trenitalia', 'Italo', 'Trenord', 'Frecciarossa']);
            $train->departure_station = $faker->city(); 
            $train->arrival_station = $faker->city();
            $train->departure_time = $faker->dateTimeBetween('now', '+1 week');
            $train->arrival_time = $faker->dateTimeInInterval($train->departure_time, '+10 hours');
            $train->train_code = $faker->bothify('??#####');
            $train->number_of_carriages = $faker->numberBetween(5, 15);
            $train->on_time = $faker->boolean(80);
            $train->is_cancelled = $faker->boolean(5);
    
            $train->save();
        }
    }
}
            

            

        

            

        

          


           