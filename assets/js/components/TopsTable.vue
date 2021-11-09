<template>
  <div class="relative overflow-hidden">
    <div class="flex justify-between">
      <div class="flex bg-golden text-white p-3 uppercase z-40 cursor-pointer "  @click="showFilter = !showFilter">
        <span>filtern</span>
        <svg class="w-6 h-6 text-white" v-show="!showFilter" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7"></path></svg>
        <svg class="w-6 h-6 text-white" v-show="showFilter" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"></path></svg>
      </div>
      <div class="flex bg-golden text-white p-3 uppercase z-40 cursor-pointer "  @click="showContact = !showContact">
        <svg class="w-6 h-6 text-white" v-show="!showContact" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7"></path></svg>
        <svg class="w-6 h-6 text-white" v-show="showContact" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"></path></svg>
        <span>kontakt</span>
      </div>

    </div>
    <transition
        name="custom-classes-transition"
        enter-active-class="animate__animated animate__slideInDown"
        leave-active-class="animate__animated animate__slideOutUp">
      <div class="absolute bg-white shadow-lg w-full cursor-pointer" v-show="showFilter">
        <div class="w-ful flex justify-end p-5" @click="showFilter = false">
          <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </div>
        <table-filters
            :min-price="minPrice"
            :max-price="maxPrice"
            :min-rent="minRent"
            :max-rent="maxRent"
            :min-rooms="minRooms"
            :max-rooms="maxRooms"
            :min-wfl="minWfl"
            :max-wfl="maxWfl">
        </table-filters>
      </div>
    </transition>

    <transition
        name="custom-classes-transition"
        enter-active-class="animate__animated animate__slideInDown"
        leave-active-class="animate__animated animate__slideOutUp">
      <div class="absolute bg-white shadow-lg w-full cursor-pointer p-5" v-show="showContact">
        <div class="w-ful flex justify-end p-5" @click="showContact = !showContact">
          <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </div>
        <contact-form></contact-form>
      </div>
    </transition>



      <div class="w-full max-w-full grid grid-cols-4 md:grid-cols-8 gap-x-3 border-b border-golden">
        <div class="uppercase text-xs font-semibold p-2 my-3 flex flex-col items-center justify-center cursor-pointer" @click="sort('top')">
          <div class="flex flex-col md:flex-row items-center space-x-1">
            <div>
              <p v-text="translations.top"></p>
              <p class="md:hidden text-xs text-turquise" v-text="translations.etage"></p>
              <p class="md:hidden text-xs text-turquise" v-text="translations.zimmer"></p>
            </div>
            <div class="flex flex-col" :class="sorted == 'top' ? 'bg-darkblue text-white' : 'text-darkblue'">
              <svg class="w-4 h-4" v-show="operator == '<'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
              <svg class="w-4 h-4" v-show="operator == '>'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
          </div>
        </div>
        <div class="hidden md:grid uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center cursor-pointer">
          <span v-text="translations.etage"></span>
        </div>
        <div class="hidden md:grid uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center cursor-pointer" @click="sort('zimmer')">
          <span v-text="translations.zimmer"></span>
        </div>
        <div class=" uppercase text-xs font-semibold p-2 my-3 flex flex-col items-center justify-center cursor-pointer" @click="sort('wfl')">
          <div class="flex flex-col md:flex-row items-center space-x-1">
            <div>
              <p v-text="translations.wfl"></p>
              <p  class="text-center md:hidden text-xs text-turquise" v-text="translations.balkon"></p>
              <p class="text-center md:hidden text-xs text-turquise">Garten</p>
            </div>
            <div class="flex flex-col" :class="sorted == 'wfl' ? 'bg-darkblue text-white' : 'text-darkblue'">
              <svg class="w-4 h-4" v-show="operator == '<'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
              <svg class="w-4 h-4" v-show="operator == '>'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
          </div>
        </div>
        <div class="hidden md:grid uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center">
          <small class="text-xs" v-text="translations.balkon"></small></div>
        <div class="hidden md:grid uppercase text-xs font-semibold p-1 my-3 flex items-center justify-center">GARTEN</div>
        <div class="uppercase text-xs font-semibold p-1 my-3 flex items-center justify-center cursor-pointer font-mono" @click="sort('miete')" v-if="minRent != 0 && maxRent != 0">
          <span v-text="translations.miete"></span>
        </div>
        <div class="uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center cursor-pointer font-mono"
             @click="sort('verkaufspreis')"
             v-if="minPrice != 0 && maxPrice != 0">
          <div class="flex flex-col md:flex-row items-center space-x-1">
            <div>
              <p v-text="translations.kaufpreis"></p>
            </div>
            <div class="flex flex-col" :class="sorted == 'verkaufspreis' ? 'bg-darkblue text-white' : 'text-darkblue'">
              <svg class="w-4 h-4" v-show="operator == '<'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
              <svg class="w-4 h-4" v-show="operator == '>'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
          </div>
        </div>
        <div class="uppercase text-xs font-semibold p-2 my-3 flex items-center justify-center">GRundriss </div>
      </div>


      <transition name="fade" v-for="top in filteredTops" :key="top.id">
        <div class="w-full max-w-full grid grid-cols-4 md:grid-cols-8 gap-x-3 border-b border-golden py-3 bg-clip-content" :class="top.sold || !top.status ? 'bg-gray-200' : 'hover:bg-gray-100'">
          <div class="text-center cursor-pointer p-2" @click="openPermalink(top)" >
            <p v-text="top.top"></p>
            <p class="md:hidden text-xs text-turquise" v-text="top.etage"></p>
            <p class="md:hidden text-xs text-turquise" v-text="top.zimmer"></p>
          </div>
          <div class="hidden md:grid text-center cursor-pointer p-2" @click="openPermalink(top)" v-text="top.etage"></div>
          <div class="hidden md:grid text-center cursor-pointer p-2" @click="openPermalink(top)" v-text="top.zimmer"></div>
          <div class="text-center cursor-pointer p-2" @click="openPermalink(top)" >
            <p v-text="top.wfl + ' m²'"></p>
            <p class="md:hidden text-xs text-turquise" v-text="top.ffl + ' m²'"></p>
            <p class="md:hidden  text-xs text-turquise" v-text="square(top.garten)"></p>
          </div>
          <div class="hidden md:grid text-center cursor-pointer p-2" @click="openPermalink(top)" v-text="top.ffl+ ' m²'"></div>
          <div class="hidden md:grid text-center cursor-pointer p-2" @click="openPermalink(top)" v-text="square(top.garten)"></div>
          <div class="text-center cursor-pointer p-2" @click="openPermalink(top)" v-text="euro(top.miete)" v-if="minRent != 0 && maxRent != 0"></div>


          <div class="text-center bg-darkblue text-white p-2 col-span-2 flex justify-center items-center" v-if="top.sold">verkauft</div>
          <div class="text-center bg-golden text-white p-2 col-span-2 flex justify-center items-center" v-if="!top.sold && !top.status">reserviert</div>

          <div class="text-center  cursor-pointer p-2" @click="openPermalink(top)" v-text="euro(top.verkaufspreis)" v-if="( minPrice != 0 && maxPrice != 0 ) && ( !top.sold && top.status )"></div>
          <div class="text-center  p-2" v-if="!top.sold && top.status">
            <a :href="gr.url" v-for="gr in top.grundrisse" target="_blank" class="flex flex-col items-center">
              <div class="text-center">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
              </div>
            </a>
          </div>
        </div>
      </transition>
  </div>

</template>

<script>
import TableFilters from "./TableFilters.vue";
import ContactForm from "./ContactForm.vue";

export default {
  name: "TopsTable",
  components: {
    TableFilters,
    ContactForm
  },
  props: ['tops', 'minPrice', 'maxPrice', 'minRent', 'maxRent', 'minRooms', 'maxRooms', 'minWfl', 'maxWfl'],

  data() {
    return {
      showFilter: false,
      showContact : false,
      filteredTops: this.tops,
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

    toggleFrei() {
      this.frei = !this.frei;
      this.filter();
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
    },


    filter() {

      if (
          this.price[0] == this.minPrice &&
          this.price[1] == this.maxPrice
      ) {
        this.frei = false;
      } else {
        this.frei = true;
      }


      this.filteredTops = this.tops.filter((top) => {

        return (top.verkaufspreis >= this.price[0] && top.verkaufspreis <= this.price[1]) && (top.zimmer >= this.rooms[0] && top.zimmer <= this.rooms[1]) && (top.wfl >= this.wfl[0] && top.wfl <= this.wfl[1]);

      });

      if (this.frei) {
        this.filteredTops = this.filteredTops.filter((top) => {
          return top.status
        });
      }
    },

    sort(col) {

      var self = this;

      if (this.sorted == col) {
        this.operator = this.operator == '>' ? '<' : '>';
      } else {
        this.operator = '>';
      }

      this.filteredTops = this.filteredTops.sort((top1, top2) => {

        var regex = /\d+\./g;

        var first = isNaN(parseFloat(top1[col])) ? parseFloat(top1[col].match(regex)) : parseFloat(top1[col]);
        var second = isNaN(parseFloat(top2[col])) ? parseFloat(top2[col].match(regex)) : parseFloat(top2[col]);

        if (eval(first + self.operator + second)) {

          return 1;

        } else {

          return -1;

        }
      });
      this.sorted = col;
    }
  },
  mounted() {
    this.sort('top');
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
  },
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