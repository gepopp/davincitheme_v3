<template>
  <vue-carousel :data="slides" indicator-type="line" :slideOnSwipe="false"></vue-carousel>
</template>


<script>
import VueCarousel from '@chenfengyuan/vue-carousel';

export default {
  name: "ImageCarousel",
  components: {
    VueCarousel
  },
  props: ['images'],
  computed: {
    slides: function () {
      var slides = [];
      this.images.map(function (url) {

        var slide = '<div class="slider">' +
          '<img src="' + url.url + '" class="w-full">' +
          '</div>';
        slides.push(slide);
      })
      return slides;
    }
  }

}
</script>

<style scoped>

</style>