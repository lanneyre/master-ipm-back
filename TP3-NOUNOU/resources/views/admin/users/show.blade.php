{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Détails de l'utilisateur</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>

                <p class="card-text"><strong>Rôle:</strong> {{ \App\Models\Role::find($user->role)->nom }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $user->description ?? 'Aucune description' }}</p>

                @if ($user->img)
                    <p class="card-text"><strong>Image de profil:</strong></p>
                    <img src="{{ asset('storage/users/' . $user->img) }}" alt="Image de {{ $user->name }}"
                        class="img-thumbnail" width="200">
                @endif

                <a href="{{ route('user.index') }}" class="btn btn-vert btnsmall btn-secondary mt-3">Retour à la
                    liste</a>
                <a href="{{ route('user.edit', $user) }}" class="btn btn-vert btnsmall btn-secondary  mt-3">Modifier</a>
            </div>
        </div>
    </div>
@endsection
