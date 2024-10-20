<?php

namespace App\Http\Controllers\Guest;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Optional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function cars() {
        $cars = Car::with('brand')->get();
        $brands = Brand::all();
        return view('guest.cars.index', compact('cars', 'brands'));
    }

    public function showCar($slug) {
        $car = Car::with('brand')->where('slug', $slug)->firstOrFail();
        return view('guest.cars.show', compact('car'));
    }

    public function brands() {
        $brands = Brand::all();
        return view('guest.brands.index', compact('brands'));
    }

    public function showBrand($slug) {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        return view('guest.brands.show', compact('brand'));
    }

    public function optionals() {
        $optionals = Optional::all();
        return view('guest.optionals.index', compact('optionals'));
    }

    public function showOptional($slug) {
        $optional = Optional::where('slug', $slug)->firstOrFail();
        return view('guest.optionals.show', compact('optional'));
    }
}
