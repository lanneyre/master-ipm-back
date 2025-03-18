import './bootstrap';
import '../css/custom.css';

import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/controller';

import { Navigation, Pagination, Autoplay } from 'swiper/modules';

document.addEventListener("DOMContentLoaded", function () {
    const swipT = new Swiper("#carrousselTemoignages", {
        loop: true,
        modules: [Navigation, Pagination, Autoplay],
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            768: { slidesPerView: 4 },
            1024: { slidesPerView: 6 },
        }
    });

    const swipS = new Swiper("#carrousselServices", {
        loop: true,
        modules: [Navigation, Pagination, Autoplay],
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: ".swiper-button-next.services",
            prevEl: ".swiper-button-prev.services",
        },
        pagination: {
            el: ".swiper-pagination.services",
            clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            768: { slidesPerView: 1 },
            1024: { slidesPerView: 4 },
        }
    });

    var sidenav = document.getElementById("mySidenav");
    var openBtn = document.getElementById("openBtn");
    var closeBtn = document.getElementById("closeBtn");

    document.querySelectorAll("#mySidenav a").forEach((link) => {
        link.onclick = clickNav;
    });


    openBtn.onclick = openNav;
    closeBtn.onclick = closeNav;

    /* Set the width of the side navigation to 250px */
    function openNav(e) {
        e.preventDefault();
        sidenav.classList.add("active");
    }

    /* Set the width of the side navigation to 0 */
    function closeNav(e) {
        e.preventDefault();
        sidenav.classList.remove("active");
    }
    function clickNav() {
        sidenav.classList.remove("active");
    }
});
