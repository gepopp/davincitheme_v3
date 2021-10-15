<template>
    <div class="fixed flex content-center w-12 h-12 shadow-lg bg-darkblue text-white z-50" style="bottom: 50px; right: 50px" @click="toTop">
        <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-double-up w-8 h-8 text-white m-auto">
          <path fill-rule="evenodd"
                d="M4.293 15.707a1 1 0 010-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414 0zm0-6a1 1 0 010-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 5.414 5.707 9.707a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
        </svg>
    </div>
</template>

<script>

import _ from 'lodash';

export default {

  name: "ScrollTop",
  data() {
    return {
      show: false,
      scrolled: 0
    }
  },
  created() {
    window.addEventListener('scroll', _.debounce( this.handleScroll, 300 ));
  },
  destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll(event) {
      this.scrolled = window.scrollY;
    },
    toTop(){
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .3s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
  opacity: 0;
}
</style>