@if (session('alert'))
    <div class="modale active">
        <div class="fenetre">
            <span class="closeModale">x</span>
            <h3 id="titre" class="{{ session('alert')['type'] }}">{{ ucfirst(session('alert')['type']) }}</h3>
            <div class="content">
                {!! session('alert')['msg'] !!}
            </div>
        </div>
    </div>
@endif
