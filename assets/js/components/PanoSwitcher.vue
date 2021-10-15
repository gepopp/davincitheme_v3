<template>

  <div>
    <pano-viewer :src="panos[0].url" :preview="loadimage"></pano-viewer>
    <ul class="flex mt-5">
      <li v-for="pano in panos" @click="reload(pano)">
        <img
          :src="pano.sizes.thumbnail"
          class="w-16 h-auto cursor-pointer mr-3 pb-3"
          :class="{ 'border-b border-golden' : active == pano.ID }"
          :title="pano.title"/>
      </li>
    </ul>
  </div>
</template>

<script>
import PanoViewer from "./PanoViewer.vue";

export default {
  name: "PanoSwitcher",
  components: {PanoViewer},
  props: ['panos', 'loadimage'],
  data() {
    return {
      active: this.panos[0].ID
    }
  },
  methods: {
    reload(pano) {
      this.active = pano.ID
      window.events.$emit('loadPano', pano.url);

    }
  }
}
</script>

<style scoped>

</style>