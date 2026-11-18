// Vite-compatible imports
import jQuery from "jquery";
window.$ = window.jQuery = jQuery;

import { Swiper } from "swiper";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { Fancybox } from "@fancyapps/ui";

window.Swiper = Swiper;

// SCSS import voor Vite bundling
import "../scss/app.scss";

// Fancybox 6
Fancybox.bind("[data-fancybox]", {});

const mq = {
    sm: 576,
    md: 768,
    lg: 992,
    xl: 1200
};

// Generieke Swiper initialisatie via data-attributen
document.querySelectorAll("[data-swiper]").forEach((el) => {
    new Swiper(el, {
        modules: [Autoplay, Navigation, Pagination],
        loop: el.hasAttribute("data-loop"),
        slidesPerView: Number(el.dataset.slidesPerView) || 1,
        spaceBetween: Number(el.dataset.spaceBetween) || 0,
        autoplay: el.hasAttribute("data-autoplay")
            ? { delay: Number(el.dataset.autoplay) || 5000 }
            : false,
        pagination: el.hasAttribute("data-pagination")
            ? { el: el.querySelector(".swiper-pagination"), clickable: true }
            : false,
        navigation: el.hasAttribute("data-navigation")
            ? {
                  nextEl: el.querySelector(".swiper-button-next"),
                  prevEl: el.querySelector(".swiper-button-prev")
              }
            : false
    });
});

// Project slider (home)
document.querySelectorAll(".js-project-slider").forEach((el) => {
    new Swiper(el, {
        modules: [Navigation],
        loop: true,
        slidesPerView: "auto",
        spaceBetween: 30,
        grabCursor: true
    });
});

// Builder gallery slider
document.querySelectorAll(".js-builder-slider").forEach((el) => {
    const line =
        el.closest(".slide-container")?.querySelector(".js-slider-line") ||
        document.querySelector(".js-slider-line");

    const swiper = new Swiper(el, {
        modules: [Navigation],
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        grabCursor: true,
        breakpoints: {
            768: { slidesPerView: 1, spaceBetween: 30 },
            992: { slidesPerView: 2, spaceBetween: 30 },
            1200: { slidesPerView: 3, spaceBetween: 30 }
        }
    });

    if (line) {
        swiper.on("slideChange", () => {
            line.dataset.number = Math.min(swiper.realIndex + 1, 4);
        });
    }
});

// Menu / panel
const replaceMenu = function () {
    if ($(window).width() < mq.lg) {
        $(".js-panel-inner").append($(".js-nav-bar-menu"));
    } else {
        $(".js-nav-bar-right").append($(".js-nav-bar-menu"));
        $(".panel").removeClass("panel-active");
        $(".js-nav-toggle").removeClass("is-active");
        $("html").removeClass("lock");
    }
};

replaceMenu();

$(window).on("resize", function () {
    replaceMenu();
});

$(document).on("click", ".js-nav-toggle", function (e) {
    e.preventDefault();
    $(this).toggleClass("is-active");
    $("html").toggleClass("lock");
});

// Vaste navigatie bij scrollen
$(window).on("scroll", function () {
    if ($(window).scrollTop() > 165) {
        $(".nav-bar").addClass("nav-bar--fixed");
    } else {
        $(".nav-bar").removeClass("nav-bar--fixed");
    }
});

// Lege paragrafen opruimen
$("p").each(function () {
    const $this = $(this);
    if ($this.html().replace(/\s|&nbsp;/g, "").length === 0) {
        $this.remove();
    }
});

// FAQ toggle
$(document).on("click", ".js-faq-toggle", function (e) {
    e.preventDefault();
    $(this).toggleClass("is-active");

    const parent = $(this).closest(".js-faq");

    if (parent.hasClass("is-active")) {
        parent
            .removeClass("is-active")
            .find(".js-faq-content")
            .stop()
            .slideUp(300);
    } else {
        parent
            .addClass("is-active")
            .find(".js-faq-content")
            .stop()
            .slideDown(300);
    }
});
