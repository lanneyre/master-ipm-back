{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Détails de la race</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $race->nom }}</h5>
                <p class="card-text"><strong>Caractéristiques :</strong>
                    {{ $race->caracteristiques ?? 'Aucune Caractéristiques' }}</p>

                <p class="card-text"><strong>Espèce :</strong>
                    {{ $race->espece->nom }}</p>

                <a href="{{ route('race.index') }}" class="btn btn-vert btnsmall btn-secondary mt-3">Retour à la
                    liste</a>
                <a href="{{ route('race.edit', $race) }}" class="btn btn-vert btnsmall btn-secondary  mt-3">Modifier</a>
            </div>
        </div>
    </div>
@endsection
