{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Créer une nouvelle race</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('race.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="caracteristiques" class="form-label">Caractéristiques</label><br>
                        <textarea name="caracteristiques" id="caracteristiques" class="form-control">{{ old('caracteristiques') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="espece" class="form-label">Espèce</label><br>
                        <select name="espece_id" id="espece" required>
                            <option value="--" selected disabled>-- Choisir une race --</option>
                            @foreach (\App\Models\Espece::all() as $espece)
                                <option value="{{ $espece->id }}">{{ $espece->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Créer</button>
                    <a href="{{ route('race.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
