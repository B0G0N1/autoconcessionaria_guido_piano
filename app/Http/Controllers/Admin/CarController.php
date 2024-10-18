<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Optional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('optionals')->get();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $optionals = Optional::all();
        return view('admin.cars.create', compact('brands', 'optionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->validated());

        if ($request->has('optionals')) {
            $car->optionals()->sync($request->optionals);
        }

        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $car->load('optionals');
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $optionals = Optional::all();
        $car->load('optionals');
        return view('admin.cars.edit', compact('car', 'brands', 'optionals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());

        if ($request->has('optionals')) {
            $car->optionals()->sync($request->optionals);
        } else {
            $car->optionals()->detach();
        }

        return redirect()->route('admin.cars.show', ['car' => $car->id])->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->optionals()->detach();
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
