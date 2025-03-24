{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Créer un animal</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('animal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label><br>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date de naissance</label>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="sexe" class="form-label">Sexe</label>
                        <select name="sexe" id="sexe" required>
                            <option value="" selected disabled>-- Sexe --</option>
                            <option value="f">
                                Femelle
                            </option>
                            <option value="m">
                                Male
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="race" class="form-label">Race</label><br>
                        <select name="race" id="race">
                            @foreach (\App\Models\Race::all() as $race)
                                <option value="{{ $race->id }}">{{ $race->nom }}
                                    ({{ $race->espece->nom }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="raceMere" class="form-label">Race de la mère</label><br>
                        <select name="race_mere" id="raceMere">
                            <option value="">-- Inconnue --</option>
                            @foreach (\App\Models\Race::all() as $raceMere)
                                <option value="{{ $raceMere->id }}">{{ $raceMere->nom }}
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
                                <option value="{{ $racePere->id }}">
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
                                        value="{{ $critere->id }}"> <label
                                        for="critere-{{ $critere->id }}">{{ $critere->nom }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status de l'animal</label><br>
                        <select name="status" id="status" required>
                            <option value="" selected disabled>-- Pas de nouveau status --</option>
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
            </div>
        </div>
    </div>
@endsection
