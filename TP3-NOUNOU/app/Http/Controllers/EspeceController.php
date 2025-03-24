<?php

namespace App\Http\Controllers;

use App\Models\Espece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EspeceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $especes = Espece::all();
        return view('admin.especes.index', compact('especes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.especes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'image|extensions:png|mimes:png'
        ]);
        $destinationPath = storage_path('app/public'); // Change selon besoin
        if ($request->hasFile('img')) {

            $img = $request->file('img');
            $fileName = $request->nom . "." . $img->extension();
            $oldFile = $destinationPath . "/" . $request->nom . "." . $img->extension();
            if (is_file($oldFile)) {
                unlink($oldFile);
            }
            $path = $img->move($destinationPath, $fileName);
        }
        Espece::create($request->only(['nom', 'description']));

        return redirect()->route('espece.index')->with('alert', ["type" => 'success', "msg" => 'Espèce créée avec succès.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Espece $espece)
    {
        //
        return view('admin.especes.show', compact('espece'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Espece $espece)
    {
        //
        return view('admin.especes.edit', compact('espece'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Espece $espece)
    {
        //
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'image|extensions:png|mimes:png'
        ]);

        $destinationPath = storage_path('app/public'); // Change selon besoin
        if ($request->hasFile('img')) {

            $img = $request->file('img');
            $fileName = $request->nom . "." . $img->extension();
            $oldFile = $destinationPath . "/" . $espece->nom . "." . $img->extension();
            if (is_file($oldFile)) {
                unlink($oldFile);
            }
            $path = $img->move($destinationPath, $fileName);
        }

        if ($espece->nom != $request->nom && !$request->hasFile('img')) {
            $oldPath = $destinationPath . "/" . $espece->nom . ".png";
            $newPath = $destinationPath . "/" . $request->nom . ".png";
            if (is_file($oldPath)) {
                rename($oldPath, $newPath);
            }
        }

        $espece->update($request->only(['nom', 'description']));


        return redirect()->route('espece.show', $espece->id)->with('alert', ["type" => 'success', "msg" => 'Espèce mise à jour avec succès.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Espece $espece)
    {
        //
        $destinationPath = storage_path('app/public'); // Change selon besoin

        $oldPath = $destinationPath . "/" . $espece->nom . ".png";
        if (is_file($oldPath)) {
            unlink($oldPath);
        }
        $espece->delete();
        return redirect()->route('espece.index')->with('alert', ["type" => 'success', "msg" => 'Espèce supprimée']);
    }
}
