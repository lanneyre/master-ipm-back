@extends('components.template.modale', ['titre' => $titre, 'type' => 'animal', 'animal' => $animal])

@section('content-' . $animal->id)
    <section class="displayContact">
        <form action="{{ route('galerie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="img" class="form-label">Image :</label><br>
                <input type="file" name="img" id="img" class="form-control">
                <input type="hidden" name="animal_id" id="animal_id" value="{{ $animal->id }}">
            </div>
            <div class="mb-3">
                <label for="legende" class="form-label">legende</label><br>
                <textarea name="legende" id="legende" class="form-control">{{ old('legende') }}</textarea>
            </div>

            <button type="submit" class="btn btnsmall btn-vert w-full rounded transition">
                Envoyer
            </button>
        </form>
    </section>
@endsection
