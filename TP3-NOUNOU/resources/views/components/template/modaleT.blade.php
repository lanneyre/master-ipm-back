@extends('components.template.modale', ["titre"=>  $t, "type"=> "temoignage", "temoignage" => $temoignage])

@section('content-'.$temoignage->id)
    {{-- {{$temoignage}} --}}

    @php
        $img = '';
        if (!empty($temoignage->img1)) {
            $img1 = $temoignage->img1;
        } 
        if (!empty($temoignage->img2)) {
            $img2 = $temoignage->img2;
        } 
        if (!empty($temoignage->img3)) {
            $img3 = $temoignage->img3;
        } 
        if (empty($img1) && empty($img2) && empty($img3) && !empty($temoignage->animal)) {
            $animal = \App\Models\Animal::find($temoignage->animal);
            $animaGal = $animal->galeries;
            if ($animaGal->count() > 0) {
                $img = $animaGal[0]->chemin;
            } else {
                $espece = \App\Models\Espece::find($animal->raceAnimal->espece_id);
                $img = '/storage/' . $espece->nom . '.png';
            }
        } else {
            $img = '/storage/temoignage.jpg';
        }

    @endphp
    <section class="displayTemoignage">
        <aside class="photo">
            <figure class="photos">
                @if (!empty($img1))
                <img src="{{$img1}}" alt="">
                @endif
                @if(!empty($img2) && !empty($img3))
                <img src="{{$img2}}" alt="">
                <img src="{{$img3}}" alt="">
                @endif
                @if (!empty($img))
                <img src="{{$img}}" alt="">
                @endif
                <figcaption>
                    @php
                        $titre = [];
                        if (!empty($temoignage->user)) {
                            $titre[] = \App\Models\User::find($temoignage->user)->name;
                        }
                        if (!empty($temoignage->animal)) {
                            $titre[] = \App\Models\Animal::find($temoignage->animal)->nom;
                        }
                    @endphp
                    {{ sizeof($titre) == 0 ? 'Anonyme' : implode(' & ', $titre) }}
                </figcaption>
            </figure>
            
            
        </aside>
        <article class="photo">
            <h4>{{ $temoignage->titre }}</h4>
            {!! $temoignage->texte !!}
        </article>
    </section>
@endsection