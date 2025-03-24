<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<ul>
    <li><a href="/" class="active">Accueil</a></li>
    @if (Auth::getUser()->role == 1)
        <li><a href="{{ route('user.index') }}">Les utilisateurs</a></li>
    @endif
    <li><a href="{{ route('animal.index') }}">Les animaux</a>
    </li>
    <li><a href="{{ route('race.index') }}">Les races</a></li>
    <li><a href="{{ route('espece.index') }}">Les espèces</a></li>
</ul>


<div id="mySidenav" class="sidenav">
    <a id="closeBtn" href="#" class="close">×</a>
    <ul>
        <li><a href="/" class="active">Accueil</a></li>
        @if (Auth::getUser()->role == 1)
            <li><a href="{{ route('user.index') }}">Les utilisateurs</a></li>
        @endif
        <li><a href="{{ route('animal.index') }}">Les animaux</a>
        </li>
        <li><a href="{{ route('race.index') }}">Les races</a></li>
        <li><a href="{{ route('espece.index') }}">Les espèces</a></li>
    </ul>
</div>

<a href="#" id="openBtn">
    <span class="burger-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</a>
