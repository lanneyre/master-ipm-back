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
        <li>
            <a href="#user" class="modaleUser icon" modale="user-{{Auth::getUser()->id}}">
                <svg width="30px" height="30px" viewBox="-6.24 -6.24 36.48 36.48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6.24" y="-6.24" width="36.48" height="36.48" rx="18.24" fill="#DDF1CF" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="9" cy="9" r="2" stroke="#1C7C54" stroke-width="1.44"></circle> <path d="M13 15C13 16.1046 13 17 9 17C5 17 5 16.1046 5 15C5 13.8954 6.79086 13 9 13C11.2091 13 13 13.8954 13 15Z" stroke="#1C7C54" stroke-width="1.44"></path> <path d="M22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C21.298 5.64118 21.5794 6.2255 21.748 7" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round"></path> <path d="M19 12H15" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round"></path> <path d="M19 9H14" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round"></path> <path d="M19 15H16" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round"></path> </g></svg>
            </a>
            <a href="{{ route('login.logout') }}" class="icon">
                <svg width="30px" height="30px" viewBox="-6.24 -6.24 36.48 36.48" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"><rect x="-6.24" y="-6.24" width="36.48" height="36.48" rx="18.24" fill="#DDF1CF" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.43200000000000005"></g><g id="SVGRepo_iconCarrier"> <path d="M8.00171 7C8.01382 4.82497 8.11027 3.64706 8.87865 2.87868C9.75733 2 11.1715 2 14 2H15C17.8284 2 19.2426 2 20.1213 2.87868C21 3.75736 21 5.17157 21 8V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H14C11.1715 22 9.75733 22 8.87865 21.1213C8.11027 20.3529 8.01382 19.175 8.00171 17" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round"></path> <path opacity="0.5" d="M8 19.5C5.64298 19.5 4.46447 19.5 3.73223 18.7678C3 18.0355 3 16.857 3 14.5V9.5C3 7.14298 3 5.96447 3.73223 5.23223C4.46447 4.5 5.64298 4.5 8 4.5" stroke="#1C7C54" stroke-width="1.44"></path> <path d="M15 12L6 12M6 12L8 14M6 12L8 10" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </a> 
            @include('components.template.user', ["titre"=>  "Mon compte", "user" => Auth::getUser()])
        </li>
    @else
        <li>
            <a href="#sign" class="modaleSign icon" modale="sign-sign">
                <svg width="30px" height="30px" viewBox="-6.24 -6.24 36.48 36.48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-6.24" y="-6.24" width="36.48" height="36.48" rx="18.24" fill="#DDF1CF" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 16C8 18.8284 8 20.2426 8.87868 21.1213C9.75736 22 11.1716 22 14 22H15C17.8284 22 19.2426 22 20.1213 21.1213C21 20.2426 21 18.8284 21 16V8C21 5.17157 21 3.75736 20.1213 2.87868C19.2426 2 17.8284 2 15 2H14C11.1716 2 9.75736 2 8.87868 2.87868C8 3.75736 8 5.17157 8 8" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round"></path> <path opacity="0.5" d="M8 19.5C5.64298 19.5 4.46447 19.5 3.73223 18.7678C3 18.0355 3 16.857 3 14.5V9.5C3 7.14298 3 5.96447 3.73223 5.23223C4.46447 4.5 5.64298 4.5 8 4.5" stroke="#1C7C54" stroke-width="1.44"></path> <path d="M6 12L15 12M15 12L12.5 14.5M15 12L12.5 9.5" stroke="#1C7C54" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </a>
        </li>
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
