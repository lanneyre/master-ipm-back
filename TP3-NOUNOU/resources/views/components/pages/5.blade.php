<section id="equipe">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->

    <article>
        <h2>Rencontrer notre équipe dévouée :</h2>
        <p>Notre équipe est composée de
            professionnels passionnés et de bénévoles
            engagés qui travaillent chaque jour pour
            offrir une seconde chance aux animaux.</p>
        <a href="#benevole" class="btn btn-vert modaleContact" modale="contact-contact">Devenir bénévole</a>
    </article>
    <aside>
        @foreach (\App\models\User::whereIn('role', [1, 3])->get() as $user)
            @php
                //dd(is_file('storage/users/' . $user->img));
                $img = empty($user->img) || !is_file('storage/users/' . $user->img) ? 'user.jpg' : $user->img;
            @endphp
            <figure class="nosmembres">
                <img src="/storage/users/{{ $img }}" alt="{{ $user->nom }}">
                <figcaption>
                    <h4>{{ $user->name }},</h4>
                    {{ $user->description }}
                </figcaption>
            </figure>
        @endforeach
    </aside>
</section>
