<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $races = Race::with(["espece"])->get();
        return view('admin.races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.races.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'caracteristiques' => 'required|string',
            'espece_id' => 'required|integer'
        ]);

        $race = Race::create($data);
        return redirect()->route('race.show', $race->id)->with('alert', ["type" => 'success', "msg" => 'Race créé avec succès.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race)
    {
        //
        return view('admin.races.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race)
    {
        //
        return view('admin.races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Race $race)
    {
        //
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'caracteristiques' => 'required|string',
            'espece_id' => 'required|integer'
        ]);

        $race->update($data);
        return redirect()->route('race.show', $race->id)->with('alert', ["type" => 'success', "msg" => 'Race mise à jour avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        //
        $race->delete();
        return redirect()->route('race.index')->with('alert', ["type" => 'success', "msg" => 'Race supprimée']);
    }
}
