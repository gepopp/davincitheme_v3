<template>
  <div class="mb-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-0">
      <!--    titlebar-->
      <div class="col-span-2 md:col-span-1 border-b border-darkblue">
        <ul class="flex md:hidden bg-turquise justify-between w-full p-3">
          <li class=" " v-for="tab in tabs">
            <a class="text-blue-500 hover:text-blue-800" @click="toggleActive(tab.title)">
              <p>
                <i :class="tab.icon" class="leading-loose text-2xl text-golden"></i>
              </p>
              <p class="text-center" :class="{'border-b-2 border-golden' : currentActive == tab.title}"></p>
            </a>
          </li>
        </ul>
        <ul class="flex-col bg-turquise p-10 hidden md:flex border-r border-darkblue">
          <li class="border-b border-golden flex" v-for="tab in tabs">
            <a
              class="inline-block py-2 cursor-pointer text-white text-golden"
              :class="{'font-semibold' : tab.title == currentActive }"
              @click="toggleActive(tab.title)"
            >
              <span style="width: 25px; display: inline-block;" class="text-golden">
                <i :class="tab.icon" class="leading-loose text-2xl"></i>
              </span>
              <span class="leading-none ml-3"
                    :class="{'underline' : tab.title == currentActive }"
              >{{ tab.title }}</span>
            </a>
            <span class="text-golden ml-auto text-4xl inline" v-if="tab.title == currentActive">&rsaquo;</span>
          </li>
          <li class="mr-1" v-if="downloads.length == 1">
            <a :href="downloads[0].url" target="_blank" class="inline-block py-2 cursor-pointer text-golden">
              <span style="width: 25px; display: inline-block;">
                <i class="icon-25 leading-loose text-2xl"></i>
              </span>
              <span class="leading-none ml-3" v-text="downloads[0].title"></span>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-span-2">
        <div class="" style="min-height: 477px">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Tabs",
  props: ['downloads'],
  data() {
    return {
      currentActive: '',
      tabs: [],
    }
  },
  mounted() {
    this.tabs = this.$children;
    this.currentActive = this.tabs[0].title;
    this.tabs[0].show = true;

  },
  methods: {
    toggleActive(active) {
      this.currentActive = active;

      this.tabs.map((tab) => {
        tab.show = tab.title == active;
      })
    }
  },
  computed: {
    folderIcon() {
      return window.home + '/wp-content/themes/da_vinci_group/public/images/icons/set2/25.svg';

    }
  }

}
</script>

<style scoped>

</style>