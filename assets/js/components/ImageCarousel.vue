<template>
  <vue-carousel :data="slides" indicator-type="line" :slideOnSwipe="true"></vue-carousel>
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
      this.images.map((url, index) => {

        var slide = '<div class="slider" @click="$root.$emit(\'openlightbox\', { index : ' + index + ' })">' +
            '<img src="' + url.url + '" class="w-full">' +
            '</div>';
        slides.push(slide);
      })
      return slides;
    }

  },
}
</script>

<style lang="scss" scoped>

</style>