<template>
  <div class="px-5 cursor-pointer z-40 flex items-center justify-center" @click="emitClick">
    <i :class="icon" class="pb-2 text-xl mr-2 hidden md:block"></i>
    <span class="leading-none align-center" :class="{'underline': active }">{{ id }}</span>
  </div>
</template>

<script>
export default {
  name: "CanvasButton",
  props: {
    'id':{}, 'icon': {}, activeStart: { default:false }
  },
  data() {
    return {
      active: this.activeStart
    }
  },
  methods: {
    emitClick() {
      window.events.$emit('canvasBtnClick', this.id);
    }
  },
  mounted() {
    window.events.$on('canvasBtnClick', (id)=>{
      if(this.id == id){
        this.active = true;
      }else{
        this.active = false;
      }
    })
  }
}
</script>

<style scoped>

</style>