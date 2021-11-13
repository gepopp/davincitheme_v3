<template>
  <div class="overflow-hidden min-h-halfscreen">
    <div class="border border-golden p-5">
      <div class="w-full max-w-full grid grid-cols-5 gap-x-3 border-b border-golden">
        <div class="uppercase text-xs font-semibold p-2 my-3 flex flex-col items-center justify-center cursor-pointer">
          <div class="flex flex-col md:flex-row items-center space-x-1">
            <div>
              <p class="transform rotate-45 md:rotate-0">Adresse</p>
            </div>
          </div>
        </div>
        <div class="uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center cursor-pointer">
          <span class="transform rotate-45 md:rotate-0">Etage / Zimmer</span>
        </div>
        <div class=" uppercase text-xs font-semibold p-2 my-3 flex flex-col items-center justify-center cursor-pointer">
            <div class="transform rotate-45 md:rotate-0">
              <p v-text="translations.wfl"></p>
            </div>
        </div>
        <div class="uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center">
          <div class="transform rotate-45 md:rotate-0">
            <small class="text-center text-xs" v-text="translations.balkon"></small>
            <p class="text-center text-xs text-turquise">Garten</p>
          </div>
        </div>
        <div class="uppercase text-xs font-semibold p-1 my-3 flex items-center justify-center cursor-pointer font-mono" v-if="maxRent != 0">
          <span class="transform rotate-45 md:rotate-0" v-text="translations.miete"></span>
        </div>
        <div class="uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center cursor-pointer font-mono" v-if="maxPrice != 0">
          <div class="flex flex-col md:flex-row items-center space-x-1">
            <div>
              <p class="transform rotate-45 md:rotate-0" v-text="translations.kaufpreis"></p>
            </div>
          </div>
        </div>
      </div>


      <transition name="fade" v-for="top in filteredTops" :key="top.id">
        <a :href="top.permalink" class="w-full max-w-full grid grid-cols-5 gap-x-3 border-b border-golden bg-clip-content" :class="top.sold || !top.status ? 'bg-gray-200' : 'hover:bg-gray-100'">
          <div class="text-center cursor-pointer p-2">
            <p class="text-xs leading-none break-words">
              <span v-text="top.address.street + ' ' + top.address.number"></span>,
              <span v-text="top.address.zip + ' ' + top.address.city"></span>,
            </p>
            <p v-text="'Top ' + top.top"></p>
          </div>
          <div class="text-center cursor-pointer p-2" v-text="top.etage + ' / ' + top.zimmer"></div>
          <div class="text-center cursor-pointer p-2" @click="openPermalink(top)">
            <p v-text="top.wfl + ' m²'"></p>
          </div>
          <div class="text-center cursor-pointer p-2 flex flex-col">
            <span v-text="top.ffl+ ' m²'"></span>
            <span class="text-xs text-turquise" v-text="square(top.garten)"></span>
          </div>
          <div class="text-center bg-darkblue text-white p-2 flex justify-center items-center" v-if="top.sold">verkauft</div>
          <div class="text-center bg-golden text-white p-2  flex justify-center items-center" v-if="!top.sold && !top.status">reserviert</div>
          <div class="text-center cursor-pointer p-2" v-text="euro(top.miete)" v-if="maxRent != 0 && ( !top.sold && top.status )"></div>
          <div class="text-center  cursor-pointer p-2" v-text="euro(top.verkaufspreis)" v-if="( maxPrice != 0 ) && ( !top.sold && top.status )"></div>
        </a>
      </transition>
    </div>
  </div>
</template>

<script>
import TableFilters from "./TableFilters.vue";
import ContactForm from "./ContactForm.vue";

export default {
  name: "TopsTableArchive",
  components: {
    TableFilters,
    ContactForm
  },
  props: ['tops', 'minPrice', 'maxPrice', 'minRent', 'maxRent', 'minRooms', 'maxRooms', 'minWfl', 'maxWfl'],

  data() {
    return {
      showFilter: false,
      showContact: false,
      filteredTops: this.tops,
      price: [this.minPrice, this.maxPrice],
      rent: [this.minRent, this.maxRent],
      rooms: [this.minRooms, this.maxRooms],
      wfl: [this.minWfl, this.maxWfl],
      frei: false,
      sorted: false,
      operator: '>',
      translations: translations
    }
  },

  methods: {

    openPermalink(top) {

      if (!top.sold && !top.status || top.sold) return;

      window.location = top.permalink;
    },

    euro(numb) {
      if (isNaN(parseInt(numb))) return this.translations.anfrage;
      return new Intl.NumberFormat('de-DE', {
        style: 'currency',
        currency: 'EUR',
        maximumFractionDigits: 0,
        minimumFractionDigits: 0
      }).format(numb);
    },

    square(numb) {
      if (isNaN(parseInt(numb)) || numb == 0) return '--';
      return numb + ' m²';
    }
  },
  created() {

    this.min = 0
    this.max = 250
    this.bgStyle = {
      backgroundColor: '#162850',
      boxShadow: 'inset 0.5px 0.5px 3px 1px rgba(0,0,0,.36)'
    }

    this.tooltipStyle = {
      backgroundColor: '#CFA075',
      borderColor: '#CFA075',
      color: '#162850'
    }

    this.processStyle = {
      backgroundColor: '#CFA075'
    }
  }
}
</script>

<style scoped lang="scss">
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
  opacity: 0;
}

.ps__rail-x {
  background-color: #1C6D8B;
}

.ps__thumb-x {
  background-color: #CFA075;
}
</style>