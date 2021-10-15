<template>
  <div>
    <transition name="fade">
      <div v-show="show" :class="{'hidden': !loaded}" style="z-index: 9999">
        <slot></slot>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "SingleMobileMenu",
  props: ['id'],
  data() {
    return {
      show: false,
      loaded: false
    }
  },
  mounted() {
    window.events.$on('toggleMenu', (id) => {
      if (this.id == id)
        this.show = !this.show;
      if(!this.show){
        window.events.$emit('toggleHamburger', 'immobilie_single');
      }
    })
    this.loaded = true;
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
  opacity: 0;
}
</style>