<?php

namespace App\Http\Controllers\Admin;

use App\Models\Optional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionalRequest;
use App\Http\Requests\UpdateOptionalRequest;
use Illuminate\Support\Str;

class OptionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $optionals = Optional::with('cars')->get();
        return view('admin.optionals.index', compact('optionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.optionals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOptionalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionalRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        Optional::create($data);

        return redirect()->route('admin.optionals.index')->with('success_create', 'Optional creato con successo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function show(Optional $optional)
    {
        $optional->load('cars');
        return view('admin.optionals.show', compact('optional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function edit(Optional $optional)
    {
        return view('admin.optionals.edit', compact('optional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionalRequest  $request
     * @param  \App\Models\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionalRequest $request, Optional $optional)
    {
        $data = $request->validated();
        if ($optional->name !== $request->name) {
            $data['slug'] = Str::slug($request->name);
        }
        $optional->update($data);

        return redirect()->route('admin.optionals.show', ['optional' => $optional->slug])->with('success_update', 'Optional aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Optional $optional)
    {
        $optional->cars()->detach();
        $optional->delete();
        
        return redirect()->route('admin.optionals.index')->with('success_delete', 'Optional eliminato con successo.');
    }
}
