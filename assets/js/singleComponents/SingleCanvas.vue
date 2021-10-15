<template>

  <div>
     <div v-show="content == 'Eckdaten'">
       <slot name="eckdaten"></slot>
     </div>
    <div v-show="content == 'plan'">
      <slot name="plan"></slot>
    </div>
     <div v-show="content == '360'">
       <slot name="rundgang"></slot>
     </div>
     <div v-show="content == 'Ausstattung'">
       <slot name="ausstattung"></slot>
     </div>
  </div>


</template>

<script>
export default {
  name: "SingleCanvas",
  data() {
    return {
      content : 'Eckdaten'
    }
  },
  methods : {

  },
  mounted() {
    window.events.$on('SetSingleCanvas', (content) => {
      this.content = content;
    });
  }
}
</script>

<style scoped>

</style>