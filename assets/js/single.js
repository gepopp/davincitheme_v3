import Vue from 'vue';

import SingleMobileMenu from "./singleComponents/SingleMobileMenu.vue";
import MobileMenu from "./components/MobileMenu.vue";
import Hamburger from "./components/Hamburger.vue";
import ContactForm from "./components/ContactForm.vue";
import SingleCanvasMenu from "./singleComponents/SingleCanvasMenu.vue";
import SingleCanvas from "./singleComponents/SingleCanvas.vue";
import ImageCarousel from "./components/ImageCarousel.vue";


window.events = new Vue();


const app = new Vue({
  el: '#app',
  components: {
    Hamburger,
    MobileMenu,
    SingleMobileMenu,
    ContactForm,
    SingleCanvasMenu,
    SingleCanvas,
    ImageCarousel,
  }
});
