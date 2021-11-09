<template>
  <div class="container mx-auto mb-10 border border-golden">
    <slot></slot>
  </div>

</template>

<script>
export default {
  name: "ProjectCanvas",
  data() {
    return {
      contents: []
    }
  },
  mounted() {
    // this.contents = this.$children;
    // window.events.$emit('canvasBtnClick',  this.$children[0].$props.id);

  }
}
</script>

<style scoped>

</style>