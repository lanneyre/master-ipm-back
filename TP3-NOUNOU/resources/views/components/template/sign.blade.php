@php
    $sign = (object) ['id' => 'sign'];
@endphp
@extends('components.template.modale', ['titre' => $titre, 'type' => 'sign', 'sign' => $sign])

@section('content-' . $sign->id)
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg text-lg">
        <div class="flex justify-around mb-6">
            <button id="showLogin" class="px-4 py-2 btn btn-vert btnsmall rounded">Connexion</button>
            <button id="showRegister"
                class="px-4 py-2 btn btn-vertpale btnsmall bg-blue-600 text-white rounded">Inscription</button>
        </div>

        {{-- Formulaire de connexion --}}
        <form id="loginForm" action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="emailLogin" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="emailLogin" name="email" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="passwordLogin" class="block text-gray-700 font-semibold">Mot de passe</label>
                <input type="password" id="passwordLogin" name="password" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded btn btn-vert btnsmall transition">
                Se connecter
            </button>
        </form>

        {{-- Formulaire d'inscription --}}
        <form id="registerForm" action="{{ route('register.submit') }}" method="POST" class="hidden">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nom et Prénom</label>
                <input type="text" id="name" name="name" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="emailRegister" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="emailRegister" name="email" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="passwordRegister" class="block text-gray-700 font-semibold">Mot de passe</label>
                <input type="password" id="passwordRegister" name="password" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="passwordConfirm" class="block text-gray-700 font-semibold">Confirmer le mot de passe</label>
                <input type="password" id="passwordConfirm" name="password_confirmation" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <button type="submit" class="w-full btn btn-vert btnsmall text-white p-2 rounded transition">
                S'inscrire
            </button>
        </form>
    </div>

    <script>
        document.getElementById('showLogin').addEventListener('click', function() {
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('registerForm').classList.add('hidden');
        });

        document.getElementById('showRegister').addEventListener('click', function() {
            document.getElementById('registerForm').classList.remove('hidden');
            document.getElementById('loginForm').classList.add('hidden');
        });
    </script>
@endsection
