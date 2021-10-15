<template>
  <div>
    <transition name="fade">
      <div class="bg-golden text-white relative shadow-2xl" v-touch:swipe.right="pullLeft" v-touch:swipe.left="pullRight" v-show="!lower || ( lower && !sticky )">
        <div ref="bar" class="container mx-auto text-white pb-2 pt-4 font-medium flex justify-between whitespace-no-wrap overflow-hidden px-3">
          <div ref="outer" class="flex min-w-full" :class="menuEntries > 3 ? 'justify-between' : ''" style="transition: margin-left .2s ease">
            <slot class="cursor-pointer"></slot>
          </div>
        </div>
        <div class="absolute w-full h-full top-0 left-0 flex justify-between items-center" v-if="arrows">
        <span class="bg-black bg-opacity-25  h-full flex items-center z-50" ref="leftarrow" @click="pullLeft">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </span>
          <span class="bg-black bg-opacity-25 ml-auto h-full flex items-center z-50" @click="pullRight">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </span>
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
    pullRight() {
      if (this.$refs.bar.offsetWidth < this.$refs.bar.scrollWidth) {
        this.marginLeft += 150;
        this.$refs.outer.style.marginLeft = '-' + this.marginLeft + 'px';
      }
    },
    pullLeft() {
      if (this.marginLeft > 0) {
        this.marginLeft -= 150;
        this.$refs.outer.style.marginLeft = '-' + this.marginLeft + 'px';
      }
    },
    calculateOverflow() {

      var element = this.$refs.bar;
      this.arrows = (element.offsetWidth < element.scrollWidth);
      this.isOverflowing = (element.offsetWidth < element.scrollWidth);

      if (element.offsetWidth >= element.scrollWidth) {
        this.$refs.outer.style.marginLeft = '0';
      }
    }
  },
  updated() {
    this.$nextTick(function () {
      // Code that will run only after the
      // entire view has been re-rendered
      this.lowerEdge = this.$refs.bar.getBoundingClientRect().top + this.$refs.bar.offsetHeight;
      this.calculateOverflow();
    })
  },
  mounted() {

    this.menuEntries = this.$refs.outer.children.length;

    var self = this;

    this.lowerEdge = this.$refs.bar.getBoundingClientRect().top + this.$refs.bar.offsetHeight;

    this.$nextTick(function () {
      this.lowerEdge = this.$refs.bar.getBoundingClientRect().top + this.$refs.bar.offsetHeight;
    })

    this.calculateOverflow();

    this.$nextTick(() => {

      window.addEventListener('resize', function () {
        self.calculateOverflow();
      });
    });


    window.events.$on('canvasBtnClick', function () {
      var element = document.getElementById('canvas-spacer');
      element.scrollIntoView({
        block:"start",
        behavior: "smooth"
      });
    });

    window.events.$on('stickyShow', function (val) {
      self.sticky = val;
      setTimeout(function () {
        self.calculateOverflow();
      }, 500)
    })

  }
}
</script>

<style scoped>
.slide-leave-active,
.slide-enter-active {
  transition: 200ms;
}

.slide-enter {
  transform: translate(-100%, 0);
  transition: transform 1s linear;
}

.slide-leave-to {
  transform: translate(-100%, 0);
}

</style>