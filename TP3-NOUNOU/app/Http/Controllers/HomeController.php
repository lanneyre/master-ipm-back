<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;
use App\Models\Critere;
use App\Models\Espece;
use App\Models\Race;
use App\Models\Temoignage;
use App\Models\Service;

class HomeController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function home(Request $request)
    {
        //
        $directory = "../resources/views/components/pages";
        $pages = array_diff(scandir($directory), array('..', '.'));
        $limit = 10;
        if ($request->has('page')) {
            $offset = ($request->page - 1) * $limit;
        } else {
            $offset = 0;
        }

        $nbAnimaux = Animal::with(['galeries', 'raceAnimal'])->count();

        return view('home', ["pages" => $pages, "vedettes" => Animal::vedettes(), "Especes" => Espece::all(), "criteres" => Critere::all(), "animaux" => Animal::with(['galeries', 'raceAnimal'])->skip($offset)->take($limit)->get(), "nbAnimaux" => $nbAnimaux, "nbAperP" => $limit, "temoignages" => Temoignage::all(), "services" => Service::all(), "request" => $request]);
    }

    public function imgService()
    {
        $s = Service::find(1);
        $path = "../storage/app/public/Service/Accueil.png";

        $s->icon = "data:image/png;base64," . base64_encode(file_get_contents($path));
        $img1 = "../storage/app/public/Service/accueil.jpg";
        $s->img1 = "data:image/jpeg;base64," . base64_encode(file_get_contents($img1));
        $ok[] = $s->save();

        $s = Service::find(2);
        $path = "../storage/app/public/Service/Soins.png";
        $s->icon = "data:image/png;base64," . base64_encode(file_get_contents($path));
        $img1 = "../storage/app/public/Service/veterinaire.png";
        $s->img1 = "data:image/png;base64," . base64_encode(file_get_contents($img1));
        $ok[] = $s->save();

        $s = Service::find(3);
        $path = "../storage/app/public/Service/home.png";
        $s->icon = "data:image/png;base64," . base64_encode(file_get_contents($path));
        $img1 = "../storage/app/public/Service/Jeu.jpg";
        $s->img1 = "data:image/jpeg;base64," . base64_encode(file_get_contents($img1));
        $ok[] = $s->save();

        dd($ok);
    }
}
