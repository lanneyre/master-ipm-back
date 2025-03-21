@php
    $user = Auth::getUser()
@endphp
@extends('components.template.modale', ['titre' => $titre, 'type' => 'user', 'user' => $user])

@section('content-' . $user->id)

<form action="{{ route('user.updateme', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div>
            <label for="name" class="block font-medium text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300">
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Mot de passe -->
        <div>
            <label for="password" class="block font-medium text-gray-700">Mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" name="password" id="password" 
                class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300">
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image de profil -->
        <div>
            <label for="img" class="block font-medium text-gray-700">Image de profil</label>
            <input type="file" name="img" id="img" class="w-full p-2 border rounded-lg">
            @if($user->img)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->img) }}" alt="Image de profil" class="h-16 rounded-lg">
                </div>
            @endif
            @error('img')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" 
                class="w-full p-2 border rounded-lg focus:ring focus:ring-indigo-300">{{ old('description', $user->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de validation -->
        <div class="text-center">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Mettre à jour
            </button>
        </div>
    </form>
@endsection