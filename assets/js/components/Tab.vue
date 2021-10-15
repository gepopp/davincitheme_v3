<template>
  <div>
    <div v-if="show">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "Tab",
  props: ['title', 'icon'],
  data() {
    return {
      show: false
    }
  }
}
</script>

<style scoped>

</style>