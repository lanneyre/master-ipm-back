<div class="modale" id="{{ $type }}-{{ $$type->id }}">
    <div class="fenetre">
        <span class="closeModale">x</span>
        <h3 id="titre">{{ $titre }}</h3>
        <div class="content">
            @yield('content-' . $$type->id)
        </div>
    </div>
</div>
