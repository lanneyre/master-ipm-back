{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Créer une nouvelle espèce</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('espece.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image de l'espèce</label>
                        <input type="file" name="img" id="img" class="form-control" pattern="*.png">
                    </div>

                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Créer</button>
                    <a href="{{ route('espece.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
