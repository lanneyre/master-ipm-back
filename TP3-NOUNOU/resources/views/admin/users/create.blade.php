{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Créer un nouvel utilisateur</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <input type="number" name="role" id="role" class="form-control" value="{{ old('role') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image de profil</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Créer</button>
                    <a href="{{ route('user.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
