{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Détails de l'espèce</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $espece->nom }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $espece->description ?? 'Aucune description' }}</p>

                @if (is_file(storage_path('app/public/') . $espece->nom . '.png'))
                    <p class="card-text"><strong>Image de race:</strong></p>
                    <img src="{{ asset('storage/' . $espece->nom) }}.png" alt="Image de {{ $espece->name }}"
                        class="img-thumbnail" width="200">
                @endif

                <a href="{{ route('espece.index') }}" class="btn btn-vert btnsmall btn-secondary mt-3">Retour à la
                    liste</a>
                <a href="{{ route('espece.edit', $espece) }}" class="btn btn-vert btnsmall btn-secondary  mt-3">Modifier</a>
            </div>
        </div>
    </div>
@endsection
