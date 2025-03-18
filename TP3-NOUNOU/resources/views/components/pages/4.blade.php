<section id="temoignages">
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <h2>Vos témoignages : </h2>
    <section id="carrousselTemoignages" class="swiper">
        <div class="swiper-wrapper">
            @forelse ($temoignages as $temoignage)
                <figure class="swiper-slide temoignage">
                    @php
                        $img = '';
                        if (!empty($temoignage->img1)) {
                            $img = $temoignage->img1;
                        } elseif (!empty($temoignage->img2)) {
                            $img = $temoignage->img2;
                        } elseif (!empty($temoignage->img3)) {
                            $img = $temoignage->img3;
                        } elseif (!empty($temoignage->animal)) {
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
                    <img src="{{ $img }}" alt="">
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
                        <h3>{{ sizeof($titre) == 0 ? 'Anonyme' : implode(' & ', $titre) }}</h3>
                        {{ $temoignage->titre }}
                    </figcaption>
                </figure>
            @empty
                <div>Nous n'avons pas encore reçu de témoignages</div>
            @endforelse
        </div>
        <!-- Boutons de navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </section>
    <div class="modale">
        <div class="fenetre">

        </div>
    </div>
</section>
