{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier la race</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('race.update', $race) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                            value="{{ old('nom', $race->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="caracteristiques" class="form-label">Caractéristiques</label><br>
                        <textarea name="caracteristiques" id="caracteristiques" class="form-control">{{ old('caracteristiques', $race->caracteristiques) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="espece" class="form-label">Espèce</label><br>
                        <select name="espece_id" id="espece">
                            @foreach (\App\Models\Espece::all() as $espece)
                                <option value="{{ $espece->id }}" @selected($espece->id == $race->espece_id)>{{ $espece->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Mettre à jour</button>
                    <a href="{{ route('race.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
