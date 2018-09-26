import 'jquery';
import 'popper.js';
import 'bootstrap';
import AOS from 'aos';
import Swiper from 'swiper';
// Can import modules as needed
// ex. import 'bootstrap/js/dist/dropdown';
import './sass/style.scss';
import 'swiper/dist/css/swiper.min.css';
import 'aos/dist/aos.css';
'use strict';

(function($) {
	AOS.init({
      offset: 0, // offset (in px) from the original trigger point
      delay: 0, // values from 0 to 3000, with step 50ms
      duration: 400, // values from 0 to 3000, with step 50ms
      easing: 'ease', // default easing for AOS animations
      once: true, // whether animation should happen only once - while scrolling down
      mirror: false, // whether elements should animate out while scrolling past them
      anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

   }); 
  $(function() {
		
    var swiperHero = new Swiper('.swiper-hero', {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      }
    });
    
    var swiper = new Swiper('.swiper-jobs', {
      slidesPerView: 4,
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      }
    });

    
	 
  });
})(jQuery);

