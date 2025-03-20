<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;
use App\Models\Critere;
use App\Models\Espece;
use App\Models\Race;
use App\Models\Temoignage;
use App\Models\Service;
use App\Models\Status;

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

        if (empty($request->espece)) {
            if (empty($request->criteres)) {
                $animaux = Animal::with(['statuses', 'galeries', 'raceAnimal'])->whereRelation("statuses", "status_id", [1, 2, 4, 5, 8, 9, 10])->skip($offset)->take($limit)->get();
            } else {
                $animaux = Animal::with(['statuses', 'galeries', 'raceAnimal', 'criteres'])
                    ->whereRelation("statuses", "status_id", [1, 2, 4, 5, 8, 9, 10])
                    ->whereRelation("criteres", "critere_id", $request->criteres)
                    ->skip($offset)->take($limit)->get();
            }
        } else {
            if (empty($request->criteres)) {
                $animaux = Animal::with(['statuses', 'galeries', 'raceAnimal'])
                    ->whereRelation("statuses", "status_id", [1, 2, 4, 5, 8, 9, 10])
                    ->whereRelation("raceAnimal", "espece_id", $request->espece)
                    ->skip($offset)->take($limit)->get();
            } else {
                $animaux = Animal::with(['statuses', 'galeries', 'raceAnimal'])
                    ->whereRelation("statuses", "status_id", [1, 2, 4, 5, 8, 9, 10])
                    ->whereRelation("raceAnimal", "espece_id", $request->espece)
                    ->whereRelation("criteres", "critere_id", $request->criteres)
                    ->skip($offset)->take($limit)->get();
            }
        }


        $nbAnimaux = Animal::with(['statuses', 'galeries', 'raceAnimal'])->whereRelation("statuses", "status_id", [1, 2, 4, 5, 8, 9, 10])->count();
        //$status = Status::whereIn("id", [1, 2, 4, 5, 8, 9, 10])->get();
        return view('home', ["pages" => $pages, "vedettes" => Animal::vedettes(), "Especes" => Espece::all(), "criteres" => Critere::all(), "animaux" => $animaux, "nbAnimaux" => $nbAnimaux, "nbAperP" => $limit, "temoignages" => Temoignage::all(), "services" => Service::all(), "request" => $request]);
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
    public function imgTem()
    {
        $path = "../storage/app/public/tem/";
        $imgs = array_diff(scandir($path), array('..', '.'));
        $ok = [];
        foreach ($imgs as $img) {
            # code...
            $t = Temoignage::inRandomOrder()->first();
            // do {
            # code...
            if (empty($t->img1)) {
                $t->img1 = "data:image/jpeg;base64," . base64_encode(file_get_contents($path . $img));
            } elseif (empty($t->img2)) {
                $t->img2 = "data:image/jpeg;base64," . base64_encode(file_get_contents($path . $img));
            } elseif (empty($t->img3)) {
                $t->img3 = "data:image/jpeg;base64," . base64_encode(file_get_contents($path . $img));
            }
            // } while (empty($t->img1) && empty($t->img2) && empty($t->img3));
            $ok[] = $t->save();
        }


        // $s->icon = "data:image/png;base64," . base64_encode(file_get_contents($path));
        // $img1 = "../storage/app/public/Service/accueil.jpg";
        // $s->img1 = "data:image/jpeg;base64," . base64_encode(file_get_contents($img1));
        // $ok[] = $s->save();

        // $s = Service::find(2);
        // $path = "../storage/app/public/Service/Soins.png";
        // $s->icon = "data:image/png;base64," . base64_encode(file_get_contents($path));
        // $img1 = "../storage/app/public/Service/veterinaire.png";
        // $s->img1 = "data:image/png;base64," . base64_encode(file_get_contents($img1));
        // $ok[] = $s->save();

        // $s = Service::find(3);
        // $path = "../storage/app/public/Service/home.png";
        // $s->icon = "data:image/png;base64," . base64_encode(file_get_contents($path));
        // $img1 = "../storage/app/public/Service/Jeu.jpg";
        // $s->img1 = "data:image/jpeg;base64," . base64_encode(file_get_contents($img1));
        // $ok[] = $s->save();

        dd($ok);
    }

    public function contact(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'phone' => 'required|regex:/^[0-9]{10}$/',
        //     'animal' => 'required|string',
        //     'message' => 'required|string|max:1000',
        // ]);

        // Ici, tu peux ajouter l'envoi d'email ou l'enregistrement en BDD
        // Exemple : Mail::to('contact@association.com')->send(new ContactMail($request->all()));

        return back()->with('alert', ["type" => 'error', "msg" => 'Votre demande a bien été envoyée.']);
    }
}
