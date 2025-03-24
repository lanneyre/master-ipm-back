{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier l'espèce</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('espece.update', $espece) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"
                            value="{{ old('nom', $espece->nom) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label><br>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $espece->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image de race</label><br>
                        <input type="file" name="img" id="img" class="form-control">
                        @if (is_file(storage_path('app/public/') . $espece->nom . '.png'))
                            <img src="{{ asset('storage/' . $espece->nom) }}.png" alt="Image de {{ $espece->nom }}"
                                class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Mettre à jour</button>
                    <a href="{{ route('espece.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
