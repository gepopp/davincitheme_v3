


<template>
  <div :class="!mobile ? 'ml-auto hidden lg:flex' : 'flex flex-col'">
    <a @click="emitCanvas('Eckdaten')" :class="linkClass('Eckdaten')" v-text="translations.eckdaten"></a>
    <a @click="emitCanvas('plan')" :class="linkClass('plan')" v-text="translations.plan"></a>
    <a @click="emitCanvas('360')" :class="linkClass('360')" v-text="translations.virtualTour"></a>
    <a @click="emitCanvas('Ausstattung')" :class="linkClass('Ausstattung')" v-text="translations.ausstattung"></a>
  </div>
</template>

<script>
export default {
  name: "SingleCanvasMenu",
  props: ['mobile'],
  data(){
    return {
      current: 'Eckdaten',
      translations: translations
    }
  },
  methods: {
    emitCanvas: function (content) {
      this.current = content;
      window.events.$emit('SetSingleCanvas', content);
      if(this.mobile){
        window.events.$emit('toggleMenu', 'immobilie_single');
      }
    },
    linkClass(content){
      var cl = 'cursor-pointer';
      if( this.mobile ){
        cl += ' p-5';
      }else{
        cl += ' cursor-pointer px-5 hover:underline';
      }
      if(this.current == content){
        cl += ' font-medium underline';
      }

      return cl;
    }
  }
}
</script>

<style scoped>

</style>