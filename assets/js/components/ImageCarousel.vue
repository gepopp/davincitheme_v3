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

        var slide = '<div class="slider relative" @click="$root.$emit(\'openlightbox\', { index : ' + index + ' })">' +
            '<img src="' + url.url + '" class="w-full">' +
            '<div class="absolute top-0 left-0 w-full h-full flex justify-center items-center"><div class="p-5 rounded-full bg-golden bg-opacity-25 cursor-pointer">' +
            '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></div></div> ' +
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