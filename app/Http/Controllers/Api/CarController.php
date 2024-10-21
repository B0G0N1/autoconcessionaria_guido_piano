<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index() {

        $cars = Car::with('brand', 'optionals')->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $cars
        ]);

    }

    public function show($slug) {
        $car = Car::with('brand', 'optionals')->where('slug', $slug)->first();

        if($car){
            return response()->json([
                'success' => true,
                'results' => $car
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
