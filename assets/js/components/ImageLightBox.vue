<template>
    <light-box :showLightBox="false" :media="media" ref="lightbox"></light-box>
</template>

<script>
import LightBox from 'vue-image-lightbox'

export default {
  name: "ImageLightBox",
  props : ['media'],
  data(){
    return {
      show : false
    }
  },
  components : {
    LightBox
  },
  mounted() {
      this.$root.$on('openlightbox', (event) => {
        this.$refs.lightbox.showImage(event.index);
        this.show = event.index;
      })
  },
  methods: {
    openlightbox() {

    }
  }
}
</script>

<style scoped>

</style>