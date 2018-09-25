import 'jquery';
import 'popper.js';
import 'bootstrap';
import 'aos';
import Swiper from 'swiper';
// Can import modules as needed
// ex. import 'bootstrap/js/dist/dropdown';
import './sass/style.scss';
import 'swiper/dist/css/swiper.min.css';
'use strict';

(function($) {
	$(function() {
		var swiper = new Swiper('.swiper-jobs', {
      slidesPerView: 4,
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      }
    });

    var swiperHero = new Swiper('.swiper-hero', {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      }
    });
	 AOS.init();
  });
})(jQuery);
