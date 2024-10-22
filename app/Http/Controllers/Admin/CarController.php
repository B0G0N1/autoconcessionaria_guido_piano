<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Optional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource with filtering.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Recupera i valori per le select
        $brands = Brand::all();
        $years = Car::select('year')->distinct()->orderBy('year', 'desc')->get();
        $colors = Car::select('color')->distinct()->get();
        $engines = Car::select('engine')->distinct()->get();
        $horsepowers = Car::select('horsepower')->distinct()->get();

        // Logica del filtro
        $query = Car::query();

        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand_id', $request->brand);
        }

        if ($request->has('model') && $request->model != '') {
            $query->where('model', 'like', '%' . $request->model . '%');
        }

        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }

        if ($request->has('used') && $request->used != '') {
            $query->where('used', $request->used);
        }

        if ($request->has('color') && $request->color != '') {
            $query->where('color', $request->color);
        }

        if ($request->has('engine') && $request->engine != '') {
            $query->where('engine', $request->engine);
        }

        if ($request->has('horsepower') && $request->horsepower != '') {
            $query->where('horsepower', $request->horsepower);
        }

        if ($request->has('doors') && $request->doors != '') {
            $query->where('doors', $request->doors);
        }

        if ($request->has('km') && $request->km != '') {
            $query->where('km', '<=', $request->km);
        }

        // Recupera i risultati filtrati
        $cars = $query->get();

        return view('admin.cars.index', compact('cars', 'brands', 'years', 'colors', 'engines', 'horsepowers'));
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
        $data = $request->validated();
        
        $brand = Brand::find($request->brand_id);
        $data['slug'] = Str::slug($brand->name . '-' . $request->model);

        $car = Car::create($data);

        if ($request->has('optionals')) {
            $car->optionals()->sync($request->optionals);
        }

        return redirect()->route('admin.cars.index')->with('success_create', 'Macchina creata con successo.');
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
        $data = $request->validated();

        if ($car->model !== $request->model) {
            $brand = Brand::find($request->brand_id);
            $data['slug'] = Str::slug($brand->name . '-' . $request->model);
        }

        $car->update($data);

        if ($request->has('optionals')) {
            $car->optionals()->sync($request->optionals);
        } else {
            $car->optionals()->detach();
        }

        return redirect()->route('admin.cars.show', ['car' => $car->slug])->with('success_update', 'Macchina aggiornata con successo.');
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

        return redirect()->route('admin.cars.index')->with('success_delete', 'Macchina eliminata con successo.');
    }
}
