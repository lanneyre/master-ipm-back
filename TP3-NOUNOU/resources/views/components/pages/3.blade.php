@php
    if (!empty($request->espece)) {
        $espece = 'espece=' . $request->espece . '&';
    } else {
        $espece = '';
    }

    if (!empty($request->critere)) {
        $criteresArray = [];
        foreach ($request->critere as $c) {
            # code...
            $criteresArray[] = 'criteres[]=' . $c;
        }
        $criteresSel = implode('&', $criteresArray);
    } else {
        $criteresSel = '';
    }
@endphp
<section id="adopter">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="mycontainer">
        <header>
            <h2>Nos compagnons à adopter :</h2>
            <ul>
                @foreach ($Especes as $espece)
                    <li>
                        <form action="/#adopter" method="get">
                            @if (!empty($request->critere))
                                @foreach ($request->critere as $c)
                                    <input type="hidden" name="criteres[]" value="{{ $c }}">
                                @endforeach
                            @endif
                            <input type="hidden" name="espece" value="{{ $espece->id }}">
                            <input type="submit" class="btn btn-vert" value="{{ $espece->nom }}">
                        </form>
                    </li>
                @endforeach
            </ul>
        </header>
        <aside>
            Je recherche :
            {{-- Critères --}}
            <form action="/#adopter" method="get" id="criteresForm">
                @if (!empty($request->espece))
                    <input type="hidden" name="espece" value="{{ $request->espece }}">
                @endif
                <ul>
                    @foreach ($criteres as $critere)
                        <li><input type="checkbox" name="criteres[]" class="criteres" value="{{ $critere->id }}"
                                id="critere-{{ $critere->id }}"
                                @if (!empty($request->criteres) && in_array($critere->id, $request->criteres)) @checked(true) @endif>
                            <label for="critere-{{ $critere->id }}">{{ $critere->nom }}</label>
                        </li>
                    @endforeach
                </ul>
            </form>

            <div class="pagination desktop">
                @if ($request->page > 1)
                    <a href="?{{ $espece }}{{ $criteresSel }}page={{ $request->page - 1 }}#adopter"> &lt; </a>
                    -
                @endif

                @php
                    $nbPage = ceil($nbAnimaux / $nbAperP);
                @endphp

                @for ($i = 1; $i <= $nbPage; $i++)
                    @if ($i > 1)
                        -
                    @endif
                    <a href="?{{ $espece }}{{ $criteresSel }}page={{ $i }}#adopter">
                        {{ $i }} </a>
                @endfor
                @if ($request->page < $nbPage)
                    @php
                        $p = isset($request->page) ? $request->page + 1 : 2;
                    @endphp
                    - <a href="?{{ $espece }}{{ $criteresSel }}page={{ $p }}#adopter"> &gt; </a>
                @endif
            </div>
        </aside>
        <article>
            @forelse ($animaux as $animal)
                <figure class="adoptable">
                    @if (empty($animal->galerie))
                        @php
                            $espece = \App\Models\Espece::find($animal->raceAnimal->espece_id);
                        @endphp
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
                <a href="?{{ $espece }}{{ $criteresSel }}page={{ $request->page - 1 }}#adopter"> &lt; </a> -
            @endif

            @php
                $nbPage = ceil($nbAnimaux / $nbAperP);
            @endphp

            @for ($i = 1; $i <= $nbPage; $i++)
                @if ($i > 1)
                    -
                @endif
                <a href="?{{ $espece }}{{ $criteresSel }}page={{ $i }}#adopter">
                    {{ $i }} </a>
            @endfor
            @if ($request->page < $nbPage)
                @php
                    $p = isset($request->page) ? $request->page + 1 : 2;
                @endphp
                - <a href="?{{ $espece }}{{ $criteresSel }}page={{ $p }}#adopter"> &gt; </a>
            @endif
        </div>
    </div>

</section>
