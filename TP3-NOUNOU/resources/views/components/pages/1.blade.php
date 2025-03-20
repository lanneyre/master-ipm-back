<section id="accueil">
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <div class="mycontainer">
        <h1>Bienvenue, chez New Life Pets</h1>

        <div class="adoptezNous">
            <a href="#adopter" class="btn btn-vert">Adopter un ami</a>
            <a href="#don" class="btn btn-vertpale modaleContact" modale="contact-contact">Faire un don</a>
        </div>

        <div class="nosVedettes">
            @foreach ($vedettes as $vedette)
                @if (!empty($vedette['Animal']))
                    <figure class="vedettes">
                        @if (empty($vedette['Animal']->galerie))
                            <img src="/storage/{{ $vedette['Espece']->nom }}.png" alt="{{ $vedette['Espece']->nom }}">
                        @else
                            <img src="/storage/animaux/{{ $vedette['Animal']->galerie[0]->chemin }}"
                                alt="{{ $vedette['Animal']->galerie[0]->legende }}">
                        @endif
                        <figcaption>
                            {{ $vedette['Animal']->nom }}, {{ $vedette['Espece']->nom }} {{ $vedette['Race']->nom }}
                            <small>
                                {{ $vedette['Animal']->sexe == 'm' ? 'Mâle' : 'Femelle' }},
                                @php
                                    $dateNaissance = $vedette['Animal']->dob;
                                    $aujourdhui = date('Y-m-d');
                                    $age = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                                @endphp
                                {{ $age->format('%y') == 0 ? $age->format('%m') . ' mois' : $age->format('%y') . ' ans' }}
                            </small>
                        </figcaption>
                    </figure>
                @endif
            @endforeach
        </div>
    </div>
</section>
