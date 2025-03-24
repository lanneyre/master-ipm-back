{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier {{ $animal->nom }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('animal.update', $animal) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                            value="{{ old('nom', $animal->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label><br>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $animal->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date de naissance</label>
                        <input type="date" name="dob" id="dob" class="form-control"
                            value="{{ old('dob', $animal->dob) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="sexe" class="form-label">Sexe</label>
                        <select name="sexe" id="sexe">
                            <option value="f" @selected($animal->sexe == 'f')>
                                Femelle
                            </option>
                            <option value="m" @selected($animal->sexe == 'm')>
                                Male
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="race" class="form-label">Race</label><br>
                        <select name="race" id="race">
                            @foreach (\App\Models\Race::all() as $race)
                                <option value="{{ $race->id }}" @selected($race->id == $animal->race)>{{ $race->nom }}
                                    ({{ $race->espece->nom }})
                                    {{ $animal->race }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="raceMere" class="form-label">Race de la mère</label><br>
                        <select name="race_mere" id="raceMere">
                            <option value="">-- Inconnue --</option>
                            @foreach (\App\Models\Race::all() as $raceMere)
                                <option value="{{ $raceMere->id }}" @selected(!empty($animal->raceMere->id) && $raceMere->id == $animal->raceMere->id)>{{ $raceMere->nom }}
                                    ({{ $raceMere->espece->nom }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="racePere" class="form-label">Race du père</label><br>
                        <select name="race_pere" id="racePere">
                            <option value="">-- Inconnue --</option>
                            @foreach (\App\Models\Race::all() as $racePere)
                                <option value="{{ $racePere->id }}" @selected(!empty($animal->racePere->id) && $racePere->id == $animal->racePere->id)>
                                    {{ $racePere->nom }} ({{ $racePere->espece->nom }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Criteres --}}
                    <div class="mb-3">
                        <p class="form-label">Critères :</p><br>
                        <div class="form-critere">
                            @foreach (\App\Models\Critere::all() as $critere)
                                <div class="form-control">
                                    <input type="checkbox" name="criteres[]" id="critere-{{ $critere->id }}"
                                        @checked($animal->criteres->contains($critere->id)) value="{{ $critere->id }}"> <label
                                        for="critere-{{ $critere->id }}">{{ $critere->nom }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    {{-- Status --}}
                    <div class="mb-3">
                        <p class="card-text"><strong>Status :</strong>
                        <ul>
                            @foreach ($animal->statuses as $status)
                                <li>- {{ $status->pivot->date }} : {{ $status->nom }}</li>
                            @endforeach
                        </ul>
                        </p>

                        <label for="status" class="form-label">Changer le status de {{ $animal->nom }}</label><br>
                        <select name="status" id="status">
                            <option value="">-- Pas de nouveau status --</option>
                            @foreach (\App\Models\Status::all() as $status)
                                <option value="{{ $status->id }}">
                                    {{ $status->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <br>
                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Mettre à jour</button>
                    <a href="{{ route('animal.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>

                {{-- Galerie d'image --}}
                <div class="mb-3">
                    <p class="card-text">
                        <strong>Galerie :</strong>
                        <a class="modaleAddPhotos" modale="animal-{{ $animal->id }}">
                            <svg width="30px" height="30px" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#1C7C54">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>plus-circle</title>
                                    <desc>Created with Sketch Beta.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                        sketch:type="MSPage">
                                        <g id="Icon-Set" sketch:type="MSLayerGroup"
                                            transform="translate(-464.000000, -1087.000000)" fill="#1C7C54">
                                            <path
                                                d="M480,1117 C472.268,1117 466,1110.73 466,1103 C466,1095.27 472.268,1089 480,1089 C487.732,1089 494,1095.27 494,1103 C494,1110.73 487.732,1117 480,1117 L480,1117 Z M480,1087 C471.163,1087 464,1094.16 464,1103 C464,1111.84 471.163,1119 480,1119 C488.837,1119 496,1111.84 496,1103 C496,1094.16 488.837,1087 480,1087 L480,1087 Z M486,1102 L481,1102 L481,1097 C481,1096.45 480.553,1096 480,1096 C479.447,1096 479,1096.45 479,1097 L479,1102 L474,1102 C473.447,1102 473,1102.45 473,1103 C473,1103.55 473.447,1104 474,1104 L479,1104 L479,1109 C479,1109.55 479.447,1110 480,1110 C480.553,1110 481,1109.55 481,1109 L481,1104 L486,1104 C486.553,1104 487,1103.55 487,1103 C487,1102.45 486.553,1102 486,1102 L486,1102 Z"
                                                id="plus-circle" sketch:type="MSShapeGroup"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        @include('admin.animals.add', [
                            'titre' => 'Ajouter une photo',
                            'animal' => $animal,
                        ])

                    <div class="galerie">
                        @forelse ($animal->galeries as $photos)
                            <figure>
                                <img src="{{ asset('storage/animaux/' . $photos->chemin) }}"
                                    alt="{{ $photos->legende }}">
                                <figcaption>
                                    {{ $photos->legende }}

                                    <a href="#" class="deletePhotos" photo="{{ $photos->id }}">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            width="30px" height="30px">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M14 10V17M10 10V17"
                                                    stroke="#1C7C54" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </a>

                                </figcaption>
                            </figure>
                        @empty
                            <p class="card-text">Il n'y a pas de photos de {{ $animal->nom }} </p>
                        @endforelse
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="formDeletePhtotos" style="display:none">
        @csrf
        @method('DELETE')
    </form>
@endsection
@section('scripts')
    <script>
        document.querySelectorAll(".deletePhotos").forEach((element) => {
            element.addEventListener("click", (event) => {
                event.preventDefault();
                if (confirm("Supprimer cette photo ?")) {
                    let link = event.currentTarget.getAttribute("photo")
                    console.log(link);
                    let form = document.querySelector("#formDeletePhtotos");
                    form.setAttribute("action", 'galerie/' + link)
                    form.submit()
                }

            });
        });
    </script>
@endsection
