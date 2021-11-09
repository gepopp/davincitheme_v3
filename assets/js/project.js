import Vue from "vue"
import ImageCarousel from "./components/ImageCarousel.vue";
import VueLazyLoad from 'vue-lazyload'
import ImageLightBox from "./components/ImageLightBox.vue";

Vue.use(VueLazyLoad)

var Emitter = require('tiny-emitter');
var emitter = new Emitter();

const app = new Vue({
    el: '#app',
    components : {
        ImageCarousel,
        ImageLightBox,
    }
})