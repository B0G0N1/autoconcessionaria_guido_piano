<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Optional;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = config('cars');

        foreach ($cars as $car) {
            $new_car = new Car();

            $brand = Brand::where('name', $car['brand'])->first();
            if ($brand) {
                $new_car->brand_id = $brand->id;
            }

            $new_car->model = $car['model'];
            $new_car->year = $car['year'];
            $new_car->color = $car['color'];
            $new_car->price = $car['price'];
            $new_car->engine = $car['engine'];
            $new_car->horsepower = $car['horsepower'];
            $new_car->doors = $car['doors'];
            $new_car->km = $car['km'];
            $new_car->used = $car['used'];
            $new_car->thumb = $car['thumb'] ?? null;
            
            $new_car->save();

            if (isset($car['optionals'])) {
                $optional_ids = Optional::whereIn('name', $car['optionals'])->pluck('id');
                
                $new_car->optionals()->attach($optional_ids);
            }
        }
    }
}
