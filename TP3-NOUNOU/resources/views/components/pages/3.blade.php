<section id="adopter">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="mycontainer">
        <header>
            <h2>Nos compagnons à adopter :</h2>
            <ul>
                @foreach ($Especes as $espece)
                    <li><a href="" class="btn  btn-vert">{{ $espece->nom }}</a></li>
                @endforeach
            </ul>
        </header>
        <aside>
            Je recherche :
            {{-- Critères --}}
            <ul>
                @foreach ($criteres as $critere)
                    <li><input type="checkbox" name="criteres[]" value="{{ $critere->id }}"
                            id="critere-{{ $critere->id }}">
                        <label for="critere-{{ $critere->id }}">{{ $critere->nom }}</label>
                    </li>
                @endforeach

            </ul>

            <div class="pagination desktop">
                @if ($request->page > 1)
                    <a href="?page={{ $request->page - 1 }}#adopter"> &lt; </a> -
                @endif

                @php
                    $nbPage = ceil($nbAnimaux / $nbAperP);
                @endphp

                @for ($i = 1; $i <= $nbPage; $i++)
                    @if ($i > 1)
                        -
                    @endif
                    <a href="?page={{ $i }}#adopter"> {{ $i }} </a>
                @endfor
                @if ($request->page < $nbPage)
                    @php
                        $p = isset($request->page) ? $request->page + 1 : 2;
                    @endphp
                    - <a href="?page={{ $p }}#adopter"> &gt; </a>
                @endif
            </div>
        </aside>
        <article>
            @forelse ($animaux as $animal)
                <figure class="adoptable">

                    @if (empty($animal->galerie))
                        @php
                            // $race = \App\Models\Race::find($animal->raceAnimal)->first();
                            $espece = \App\Models\Espece::find($animal->raceAnimal->espece_id);
                        @endphp
                        {{-- {{ $animal->raceAnimal->espece_id }}{{ $espece }} --}}
                        <img src="/storage/{{ $espece->nom }}.png" alt="{{ $espece->nom }}">
                    @else
                        <img src="/storage/animaux/{{ $animal->galerie[0]->chemin }}"
                            alt="{{ $animal->galerie[0]->legende }}">
                    @endif
                    <figcaption>
                        {{ $animal->nom }}, {{ $espece->nom }} {{ $animal->raceAnimal->nom }}
                        <small>
                            {{ $animal->sexe == 'm' ? 'Mâle' : 'Femelle' }},
                            @php
                                $dateNaissance = $animal->dob;
                                $aujourdhui = date('Y-m-d');
                                $age = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                            @endphp
                            {{ $age->format('%y') == 0 ? $age->format('%m') . ' mois' : $age->format('%y') . ' ans' }}
                        </small>
                    </figcaption>
                </figure>


            @empty
                <div>Pas d'animaux</div>
            @endforelse
        </article>

        <div class="pagination mobile">
            @if ($request->page > 1)
                <a href="?page={{ $request->page - 1 }}#adopter"> &lt; </a> -
            @endif

            @php
                $nbPage = ceil($nbAnimaux / $nbAperP);
            @endphp

            @for ($i = 1; $i <= $nbPage; $i++)
                @if ($i > 1)
                    -
                @endif
                <a href="?page={{ $i }}#adopter"> {{ $i }} </a>
            @endfor
            @if ($request->page < $nbPage)
                @php
                    $p = isset($request->page) ? $request->page + 1 : 2;
                @endphp
                - <a href="?page={{ $p }}#adopter"> &gt; </a>
            @endif
        </div>
    </div>

</section>
