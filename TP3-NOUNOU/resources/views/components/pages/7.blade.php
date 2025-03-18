<section id="services">
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <h2>Nos services : </h2>
    <section id="carrousselServices" class="swiper">
        <div class="swiper-wrapper">
            @forelse ($services as $service)
                <figure class="swiper-slide service">
                    @php
                        $img = '';
                        if (!empty($service->img1)) {
                            $img = $service->img1;
                        } elseif (!empty($service->img2)) {
                            $img = $service->img2;
                        } elseif (!empty($service->img3)) {
                            $img = $service->img3;
                        } else {
                            $img = '/storage/service.jpg';
                        }

                    @endphp
                    <img src="{{ $img }}" alt="">
                    <figcaption>
                        <h3>
                            @if (!empty($service->icon))
                                <img src="{{ $service->icon }}" alt="" class="icon">
                            @endif
                            {{ $service->titre }}
                        </h3>
                        {!! $service->description !!}
                    </figcaption>
                </figure>
            @empty
                <div>Nous n'avons pas encore reçu de témoignages</div>
            @endforelse
            <!-- Boutons de navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <div class="modale">
        <div class="fenetre">

        </div>
    </div>
</section>
