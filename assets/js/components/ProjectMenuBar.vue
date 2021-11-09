<template>
  <div class="mb-10 border-b border-golden overflow-hidden">
    <transition name="fade">
      <div class="container mx-auto text-white pb-2 pt-4 font-medium flex justify-between px-3">
        <div ref="outer" class="flex flex-col md:flex-row items-center w-full">
          <slot class="cursor-pointer"></slot>
        </div>
      </div>
    </transition>
  </div>
</template>


<script>
export default {
  name: "ProjectMenuBar",
  components: {},
  props: {
    lower: {
      default: false
    }
  },
  data() {
    return {
      marginLeft: 0,
      arrows: false,
      isOverflowing: false,
      sticky: false,
      menuEntries: 0,
    }
  },
  methods: {
    mounted() {
    }
  }
}
</script>

<style scoped lang="scss">

</style>