import '../sass/main.scss';

import Alpine from 'alpinejs';

import { projectFilterbar } from "./components/ProjectFilterBar";


window.Alpine = Alpine;
Alpine.start();

//import Vue from 'vue';
// import ProjectFilterBar from "./components/ProjectFilterBar.vue";
//
// import ClassicCarousel from "./components/ClassicCarousel.vue";
// import AgileSlider from "./components/AgileSlider.vue";
// import ImageCarousel from "./components/ImageCarousel.vue";
// import Tabs from "./components/Tabs.vue";
// import Tab from "./components/Tab.vue";
// import * as VueGoogleMaps from 'vue2-google-maps';
// import Map from "./components/Map.vue";
// import ContactForm from "./components/ContactForm.vue";
// import Hamburger from "./components/Hamburger.vue";
// import MobileMenu from "./components/MobileMenu.vue";
// import ScrollTop from "./components/ScrollTop.vue";
// import PanoViewer from "./components/PanoViewer.vue";
// import PanoSwitcher from "./components/PanoSwitcher.vue";
// import TopsTable from "./components/TopsTable.vue";
// import ProjectMenuBar from "./components/ProjectMenuBar.vue";
// import CanvasButton from "./components/CanvasButton.vue";
// import ProjectCanvas from "./components/ProjectCanvas.vue"
// import ProjectCanvasContent from "./components/ProjectCanvasContent.vue";
//
//
// Vue.use(VueGoogleMaps, {
//   load: {
//     key: 'AIzaSyD7ZMrbaJfP9SPfz5o4MDS6QgH6cYW-Ub0',
//     libraries: 'places',
//     installComponents: true
//   }
// })
//
// import LoadScript from 'vue-plugin-load-script';
//
// Vue.use(LoadScript);
//
// import PerfectScrollbar from 'vue2-perfect-scrollbar'
// import 'vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css'
//
// Vue.use(PerfectScrollbar)
//
// import Vue2TouchEvents from 'vue2-touch-events'
//
// Vue.use(Vue2TouchEvents, { swipeTolerance: 100, threshold: 10 });
//
//
// window.events = new Vue();
//
// const app = new Vue({
//     el: '#app',
//     components: {
//     ClassicCarousel,
//     AgileSlider,
//     ImageCarousel,
//     Tabs,
//     Tab,
//     ContactForm,
//     Hamburger,
//     MobileMenu,
//     StickyMenü,
//     ScrollTop,
//     PanoViewer,
//     PanoSwitcher,
//         ProjectFilterBar,
//     TopsTable,
//     ProjectMenuBar,
//     CanvasButton,
//     ProjectCanvas,
//     ProjectCanvasContent
//     }
// });
//
//
// After you create app
//window.__VUE_DEVTOOLS_GLOBAL_HOOK__.Vue = app.constructor;
