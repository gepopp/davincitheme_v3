<template>
  <div>
    <div id="panorama"></div>
  </div>
</template>

<script>
export default {
  name: "PanoViewer",
  props: ['src', 'id', 'preview'],
  data() {
    return {
      viewer: false
    }
  },
  methods: {
    reload(url) {
      var urlp = url;
      this.viewer.destroy();
      this.viewer = pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": urlp,
        "autoLoad": true,
        "preview": this.preview
      });
    }
  },
  mounted() {
    this.$loadScript('https://davincigroup.eu/wp-content/themes/da_vinci_group/pannellum.js')
      .then(() => {
        this.viewer = pannellum.viewer('panorama', {
          "type": "equirectangular",
          "panorama": this.src,
          "autoLoad": true,
          "preview": this.preview
        });
      })
    window.events.$on('loadPano', (url) => {
      this.reload(url)
    })
  }
}
</script>

<style scoped>
#panorama {
  width: 100%;
  height: 800px;
}
</style>