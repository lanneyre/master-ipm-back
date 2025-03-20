<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<ul>
    <li><a href="#accueil" class="active">Accueil</a></li>
    <li><a href="#adopter">Adopter</a></li>
    <li><a href="#temoignages">Témoignages</a></li>
    <li><a href="#equipe">Notre équipe</a></li>
    <li><a href="#aide">Nous aider</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#contact">Contact</a></li>
    @auth
        <li><a href="{{ route('login.logout') }}">Déconnexion</a></li>
    @else
        <li><a href="#sign" class="modaleSign" modale="sign-sign">Login</a></li>
    @endauth


</ul>


<div id="mySidenav" class="sidenav">
    <a id="closeBtn" href="#" class="close">×</a>
    <ul>
        <li><a href="#accueil">Accueil</a></li>
        <li><a href="#adopter">Adopter</a></li>
        <li><a href="#temoignages">Témoignages</a></li>
        <li><a href="#equipe">Notre équipe</a></li>
        <li><a href="#aide">Nous aider</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        @auth
            <li><a href="{{ route('login.logout') }}">Déconnexion</a></li>
        @else
            <li><a href="#sign" class="modaleSign" modale="sign-sign">Login</a></li>
        @endauth
    </ul>
</div>

<a href="#" id="openBtn">
    <span class="burger-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</a>

@include('components.template.sign', ['titre' => 'Connexion / Inscription'])
