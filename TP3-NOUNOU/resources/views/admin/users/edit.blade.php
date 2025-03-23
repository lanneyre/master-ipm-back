{{-- Layout principal --}}
@extends('admin.layoutadmin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier l'utilisateur</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas modifier)</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <select name="role" id="role" class="form-control" required>
                            @foreach (\App\Models\Role::all() as $role)
                                <option value="{{ $role->id }}" @selected($role->id == $user->role)>{{ $role->nom }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label><br>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $user->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image de profil</label><br>
                        <input type="file" name="img" id="img" class="form-control">
                        @if ($user->img)
                            <img src="{{ asset('storage/users/' . $user->img) }}" alt="Image de {{ $user->name }}"
                                class="img-thumbnail mt-2" width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-vert btnsmall btn-secondary ">Mettre à jour</button>
                    <a href="{{ route('user.index') }}" class="btn btn-vert btnsmall btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
@endsection
