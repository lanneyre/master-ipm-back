<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Race;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $animaux = Animal::with(['raceAnimal', 'raceMere', 'racePere', 'galeries', 'criteres', 'statuses'])->get();
        return view('admin.animals.index', compact('animaux'));
        //return response()->json(Animal::with(['raceAnimal', 'race_mere', 'race_pere', 'galeries', 'criteres'])->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $v = $request->validate([
            'nom' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'sexe' => 'required|string|max:1',
            'description' => 'nullable|string',
            'race' => 'nullable|integer',
            'race_mere' => 'nullable|integer',
            'race_pere' => 'nullable|integer',
        ]);

        if ($v === false) {
            return redirect()->route('animal.index')->with('alert', ["type" => 'error', "msg" => 'l\'animal n\'a pas pu être modifié']);
        }

        $animal = Animal::create($v);
        $animal->criteres()->attach($request->criteres);

        if ($request->has('status')) {
            $animal->statuses()->attach($request->status, ["date" => date("Y-m-d")]);
        }
        $animal->update();
        return redirect()->route('animal.edit', $animal->id)->with('alert', ["type" => 'success', "msg" => 'l\'animal a été créé']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
        $animal = Animal::with(['raceAnimal', 'raceMere', 'racePere', 'galeries', 'criteres', 'statuses'])->where("id", $animal->id)->first();
        return view('admin.animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        //
        $animal = Animal::with(['raceAnimal', 'raceMere', 'racePere', 'galeries', 'criteres', 'statuses'])->where("id", $animal->id)->first();
        //dd($animal);
        return view('admin.animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //
        //dd($animal);
        $v = $request->validate([
            'nom' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'sexe' => 'required|string|max:1',
            'description' => 'nullable|string',
            'race' => 'nullable|integer',
            'race_mere' => 'nullable|integer',
            'race_pere' => 'nullable|integer',
        ]);

        if ($v === false) {
            return redirect()->route('animal.index')->with('alert', ["type" => 'error', "msg" => 'l\'animal n\'a pas pu être modifié']);
        }
        $animal->criteres()->detach();
        $animal->criteres()->attach($request->criteres);

        if ($request->has('status')) {
            $animal->statuses()->attach($request->status, ["date" => date("Y-m-d")]);
        }

        $animal->update($request->all());


        return redirect()->route('animal.edit', $animal->id)->with('alert', ["type" => 'success', "msg" => 'l\'animal a été modifié']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
        $animal->delete();
        return redirect()->route('animal.index')->with('alert', ["type" => 'success', "msg" => 'Animal supprimé']);
    }
}
