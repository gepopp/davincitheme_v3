<template>
  <div v-if="show">
    <transition name="fade">
      <div>
        <slot></slot>
      </div>
    </transition>
  </div>
</template>

<script>
import ContactForm from "./ContactForm.vue";

export default {
  name: "ProjectCanvasContent",
  props: {'id':{}, activeStart:false},
  components:{
    ContactForm
  },
  data(){
    return{
      show: this.activeStart
    }
  },
  mounted() {
    this.$root.$on('canvasBtnClick', (id)=>{
      if(this.id == id){
        this.show = true
      }else{
        this.show = false
      }
    })
  }
}
</script>

<style scoped lang="scss">
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

</style>