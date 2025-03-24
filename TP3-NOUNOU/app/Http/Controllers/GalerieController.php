<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use Illuminate\Http\Request;

class GalerieController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $v = $request->validate([
            'img' => 'required|image',
            'animal_id' => 'required|integer',
            'legend' => 'string'
        ]);

        $destinationPath = storage_path('app/public/animaux/'); // Change selon besoin
        if ($request->hasFile('img')) {

            $img = $request->file('img');
            $animal = $request->animal_id;
            $fileName = uniqid("img_" . $animal . "_") . "." . $img->extension();
            //$f = $destinationPath . "/" . $fileName;

            $v["chemin"] = $fileName;
            unset($v["img"]);
            $img->move($destinationPath, $fileName);
            Galerie::create($v);
            return redirect()->route('animal.edit', $animal)->with('alert', ["type" => 'success', "msg" => 'lPhoto Rajouté']);
        }
        return redirect()->route('animal.edit', $request->animal_id)->with('alert', ["type" => 'error', "msg" => 'Une image est obligatoire']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galerie $galerie)
    {
        //
        $destinationPath = storage_path('app/public/animaux/');
        $img = $destinationPath . $galerie->chemin;
        if (is_file($img)) {
            unlink($img);
        }
        $animal = $galerie->animal_id;
        $galerie->delete();
        return redirect()->route('animal.edit', $animal)->with('alert', ["type" => 'success', "msg" => 'Photo supprimée']);
    }
}
