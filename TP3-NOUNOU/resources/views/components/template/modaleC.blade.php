@php
    $contact = (object) ['id' => 'contact'];
@endphp
@extends('components.template.modale', ['titre' => $titre, 'type' => 'contact', 'contact' => $contact])

@section('content-' . $contact->id)
    <section class="displayContact">
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nom et Prénom</label>
                <input type="text" id="name" name="name" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold">Téléphone</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required
                    class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Format : 0601020304">
            </div>

            <div class="mb-4">
                <label for="motif" class="block text-gray-700 font-semibold">Motif du contact</label>
                <select id="motif" name="motif" required class="w-full p-2 border border-gray-300 rounded mt-1">
                    <option value="">Sélectionnez un motif</option>
                    <option value="adoption">Adoption</option>
                    <option value="bénévolat">Devenir bénévole</option>
                    <option value="don">Faire un don</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold">Message</label>
                <textarea id="message" name="message" rows="4" required class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
            </div>

            <button type="submit" class="btn btnsmall btn-vert w-full rounded transition">
                Envoyer
            </button>
        </form>
    </section>
@endsection
