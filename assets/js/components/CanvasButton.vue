<template>
  <div class="space-x-10 md:space-x-2 pr-3 my-2 md:my-0 cursor-pointer z-40 flex items-center w-full whitespace-no-wrap" @click="$root.$emit('canvasBtnClick', id)" >
    <slot></slot>
    <span class="leading-none align-center text-golden whitespace-no-wrap pb-2"
          :class="{'border-b-2 border-golden': active }"
          style="white-space: nowrap">{{ id }}</span>
  </div>
</template>

<script>
export default {
  name: "CanvasButton",
  props: {
    'id':{}, activeStart: { default:false }
  },
  data() {
    return {
      active: this.activeStart
    }
  },
  mounted() {
    this.$root.$on('canvasBtnClick', (id)=>{
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