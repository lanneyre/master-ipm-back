{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $animal->nom }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>Nom : </strong>{{ $animal->nom }}</h5>
                <p class="card-text"><strong>Description :</strong>
                    {{ $animal->description ?? 'Aucune description' }}</p>

                <p class="card-text"><strong>Race :</strong>
                    {{ $animal->raceAnimal->nom }} ({{ $animal->raceAnimal->espece->nom }})</p>
                @if ($animal->racePere)
                    <p class="card-text"><strong>Père :</strong>
                        {{ $animal->racePere->nom }} ({{ $animal->racePere->espece->nom }})</p>
                @endif
                @if ($animal->raceMere)
                    <p class="card-text"><strong>Mère :</strong>
                        {{ $animal->raceMere->nom }} ({{ $animal->raceMere->espece->nom }})</p>
                @endif
                {{-- Criteres --}}
                <p class="card-text"><strong>Critères :</strong>
                <ul>
                    @foreach ($animal->criteres as $critere)
                        <li>- {{ $critere->nom }} : {{ $critere->description }}</li>
                    @endforeach
                </ul>
                </p>
                {{-- Historique statut --}}
                <p class="card-text"><strong>Statut :</strong>
                <ul>
                    @foreach ($animal->statuses as $statut)
                        <li>- {{ $statut->pivot->date }} : {{ $statut->nom }}</li>
                    @endforeach
                </ul>
                </p>

                {{-- Galerie d'image --}}
                <br>
                <p class="card-text"><strong>Galerie :</strong>
                <div class="galerie">
                    @forelse ($animal->galeries as $photos)
                        <figure>
                            <img src="{{ asset('storage/animaux/' . $photos->chemin) }}" alt="{{ $photos->legende }}">
                            <figcaption>{{ $photos->legende }}</figcaption>
                        </figure>
                    @empty
                        <p class="card-text">Il n'y a pas de photos de {{ $animal->nom }} </p>
                    @endforelse
                </div>
                </p>

                <br>
                <a href="{{ route('animal.index') }}" class="btn btn-vert btnsmall btn-secondary mt-3">Retour à la
                    liste</a>
                <a href="{{ route('animal.edit', $animal) }}"
                    class="btn btn-vert btnsmall btn-secondary  mt-3">Modifier</a>
            </div>
        </div>
    </div>
@endsection
