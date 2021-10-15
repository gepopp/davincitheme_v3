<template>
  <div>
    <div class="p-5 border border-golden border-b-0">
      <h2 class="text-2xl text-golden mb-3" v-text="translations.filtern"></h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="col-span-1 mb-3 px-3" v-if="maxPrice != 0 && minPrice != 0">
          <div class="flex justify-between">
            <div class="text-primary" v-text="translations.preis"></div>
            <div class="text-primary">{{ euro(price[0]) }} - {{ euro(price[1]) }}</div>
          </div>
          <vue-slider
            :min="minPrice"
            :max="maxPrice"
            :interval="calculateDivider(minPrice, maxPrice)"
            tooltip="none"
            @change="filter"
            :dotSize="25"
            v-model="price">
          </vue-slider>
        </div>

        <div class="col-span-1 mb-3 px-3" v-if="maxRent != 0 && minRent != 0">
          <div class="flex justify-between">
            <div class="text-primary" v-text="translations.miete"></div>
            <div class="text-primary">{{ euro(rent[0]) }} - {{ euro(rent[1]) }}</div>
          </div>
          <vue-slider
            :min="minRent"
            :max="maxRent"
            :interval="calculateDivider(minRent, maxRent)"
            tooltip="none"
            @change="filter"
            :dotSize="25"
            v-model="rent">
          </vue-slider>
        </div>


        <div class="col-span-1 mb-3 px-3">
          <div class="flex justify-between">
            <div class="text-primary" v-text="translations.wfl"></div>
            <div class="text-primary">{{ wfl[0] }} m² - {{ wfl[1] }} m²</div>
          </div>
          <vue-slider
            :min="minWfl"
            :max="maxWfl"
            :interval="calculateDivider(minWfl, maxWfl)"
            tooltip="none"
            @change="filter"
            :dotSize="25"
            v-model="wfl">
          </vue-slider>
        </div>

        <div class="col-span-1 mb-3 px-3">
          <div class="flex justify-between">
            <div class="text-primary" v-text="translations.zimmer"></div>
            <div class="text-primary">{{ rooms[0] }} - {{ rooms[1] }}</div>
          </div>
          <vue-slider
            :min="minRooms"
            :max="maxRooms"
            :interval="1"
            tooltip="none"
            @change="filter"
            :dotSize="25"
            v-model="rooms">
          </vue-slider>
        </div>

        <div class="col-span-1 mb-3 px-3">
          <div class="text-golden flex mt-5">
            <div class="border border-golden py-2 px-5 mr-3 cursor-pointer text-center inline"
                 :class="{ 'bg-golden text-white' :  frei }"
                 @click="toggleFrei"
                 v-text="translations.free"
            >
            </div>
            <div class="bg-golden text-white py-2 px-5 cursor-pointer text-center inline" @click="resetFilters" v-text="translations.reset"></div>
          </div>
        </div>
      </div>
    </div>


    <perfect-scrollbar>
      <!--    <div style="max-width: 100%; overflow: scroll;">-->
      <table class="border-golden w-full max-w-full border mb-5">
        <thead>
        <tr>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer" @click="sort('top')">
            <span v-text="translations.top"></span>
            <span :class="{'text-golden font-bold': sorted=='top'}">
              <svg version="1.1" class="h-3 inline text-darkblue" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 27.414 32" style="enable-background:new 0 0 27.414 32;" xml:space="preserve">
<g>
	<path d="M6,0.293l-6,6l1.414,1.414l4.293-4.293V30h2V3.414L12,7.707l1.414-1.414l-6-6C7.023-0.098,6.391-0.098,6,0.293z"/>
	<path d="M26,24.293l-4.293,4.293V2h-2v26.586l-4.293-4.293L14,25.707l6,6C20.195,31.902,20.451,32,20.707,32
		s0.512-0.098,0.707-0.293l6-6L26,24.293z"/>
</g>
</svg>
            </span>
          </th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer" @click="sort('etage')">
            <span v-text="translations.etage"></span>
            <span :class="{'text-golden font-bold': sorted=='etage'}">
              <svg version="1.1" class="h-3 inline text-darkblue" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 27.414 32" style="enable-background:new 0 0 27.414 32;" xml:space="preserve">
<g>
	<path d="M6,0.293l-6,6l1.414,1.414l4.293-4.293V30h2V3.414L12,7.707l1.414-1.414l-6-6C7.023-0.098,6.391-0.098,6,0.293z"/>
	<path d="M26,24.293l-4.293,4.293V2h-2v26.586l-4.293-4.293L14,25.707l6,6C20.195,31.902,20.451,32,20.707,32
		s0.512-0.098,0.707-0.293l6-6L26,24.293z"/>
</g>
</svg>
            </span>
          </th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer" @click="sort('zimmer')">
            <span v-text="translations.zimmer"></span>
            <span :class="{'text-golden font-bold': sorted=='zimmer'}">
               <svg version="1.1" class="h-3 inline text-darkblue" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 27.414 32" style="enable-background:new 0 0 27.414 32;" xml:space="preserve">
<g>
	<path d="M6,0.293l-6,6l1.414,1.414l4.293-4.293V30h2V3.414L12,7.707l1.414-1.414l-6-6C7.023-0.098,6.391-0.098,6,0.293z"/>
	<path d="M26,24.293l-4.293,4.293V2h-2v26.586l-4.293-4.293L14,25.707l6,6C20.195,31.902,20.451,32,20.707,32
		s0.512-0.098,0.707-0.293l6-6L26,24.293z"/>
</g>
</svg>
            </span>
          </th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer" @click="sort('wfl')">
            <span v-text="translations.wfl"></span>
            <span :class="{'text-golden font-bold': sorted=='wfl'}">
               <svg version="1.1" class="h-3 inline text-darkblue" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 27.414 32" style="enable-background:new 0 0 27.414 32;" xml:space="preserve">
<g>
	<path d="M6,0.293l-6,6l1.414,1.414l4.293-4.293V30h2V3.414L12,7.707l1.414-1.414l-6-6C7.023-0.098,6.391-0.098,6,0.293z"/>
	<path d="M26,24.293l-4.293,4.293V2h-2v26.586l-4.293-4.293L14,25.707l6,6C20.195,31.902,20.451,32,20.707,32
		s0.512-0.098,0.707-0.293l6-6L26,24.293z"/>
</g>
</svg>
            </span>
          </th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center ">
            <small class="text-xs" v-text="translations.balkon"></small></th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center">GARTEN</th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer font-mono" @click="sort('miete')" v-if="minRent != 0 && maxRent != 0">
            <span v-text="translations.miete"></span>
            <div :class="{'text-golden font-bold': sorted=='miete'}" v-if="operator == '>'">
              <svg version="1.1" class="h-3 inline text-darkblue" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.414 32" style="enable-background:new 0 0 27.414 32;" xml:space="preserve">
<g>
	<path d="M6,0.293l-6,6l1.414,1.414l4.293-4.293V30h2V3.414L12,7.707l1.414-1.414l-6-6C7.023-0.098,6.391-0.098,6,0.293z"/>
  <path d="M26,24.293l-4.293,4.293V2h-2v26.586l-4.293-4.293L14,25.707l6,6C20.195,31.902,20.451,32,20.707,32s0.512-0.098,0.707-0.293l6-6L26,24.293z"/>
</g>
</svg>
            </div>
          </th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer font-mono"
              @click="sort('verkaufspreis')"
              v-if="minPrice != 0 && maxPrice != 0">
            <span v-text="translations.kaufpreis"></span>
            <div :class="{'text-golden font-bold': sorted=='verkaufspreis'}">
              <svg version="1.1" class="h-3 inline text-darkblue" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="0 0 27.414 32" style="enable-background:new 0 0 27.414 32;" xml:space="preserve">
<g>
	<path d="M6,0.293l-6,6l1.414,1.414l4.293-4.293V30h2V3.414L12,7.707l1.414-1.414l-6-6C7.023-0.098,6.391-0.098,6,0.293z"/>
  <path d="M26,24.293l-4.293,4.293V2h-2v26.586l-4.293-4.293L14,25.707l6,6C20.195,31.902,20.451,32,20.707,32
		s0.512-0.098,0.707-0.293l6-6L26,24.293z"/>
</g>
</svg>
            </div>
          </th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center" v-text="translations.grundriss"></th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center" v-text="translations.frei"></th>
          <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center" v-text="translations.details"></th>
        </tr>
        </thead>


        <tbody>
        <transition name="fade" v-for="top in filteredTops" :key="top.id">
          <tr class="hover:bg-gray-300" :class="{ 'bg-gray-500 bg-opacity-25 text-opacity-50': !top.status }">
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="top.top"></td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="top.etage"></td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="top.zimmer"></td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="top.wfl + ' m²'"></td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="top.ffl+ ' m²'"></td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="square(top.garten)"></td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="euro(top.miete)" v-if="minRent != 0 && maxRent != 0"></td>


            <td colspan="4" class="text-center border border-golden bg-red-500 text-white" v-if="top.sold">verkauft</td>
            <td colspan="4" class="text-center border border-golden bg-orange-500 text-white" v-if="!top.sold && !top.status">reserviert</td>

            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-text="euro(top.verkaufspreis)" v-if="( minPrice != 0 && maxPrice != 0 ) && ( !top.sold && top.status )"></td>
            <td class="text-center border border-golden" v-if="!top.sold && top.status">
              <a :href="gr.url" v-for="gr in top.grundrisse" target="_blank" class="flex flex-col items-center">
                <div class="text-center">
                  <svg data-v-0af32bde="" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 700 700" xml:space="preserve" class="w-8"><g data-v-0af32bde=""><path data-v-0af32bde="" d="M563.82,215.54L383.58,30H180.03c-19.54,0-37.44,7.67-50.39,20.2c-12.98,12.49-21.18,30.11-21.17,49.47v428.48
		c0,19.36,8.2,36.98,21.17,49.46c12.95,12.53,30.85,20.21,50.39,20.21h316.94c19.54,0,37.44-7.68,50.4-20.21
		c12.97-12.48,21.18-30.1,21.16-49.46V220.38L563.82,215.54z M522.95,221.19h-89.19c-16.14,0-30.52-6.18-40.85-15.97
		c-10.32-9.84-16.43-22.93-16.44-37.46V70.41L522.95,221.19z M524.26,553.71c-6.92,6.67-16.49,10.87-27.3,10.88H180.03
		c-10.8-0.01-20.37-4.2-27.3-10.88c-6.91-6.71-11-15.62-11-25.55V99.68c0-9.94,4.1-18.85,11-25.56c6.93-6.67,16.5-10.87,27.3-10.87
		h160.82v104.5c-0.01,24.82,10.69,47.35,27.55,63.31c16.85,16,40.02,25.75,65.37,25.75h101.51v271.35
		C535.26,538.09,531.17,547,524.26,553.71z"></path> <g data-v-0af32bde=""><path data-v-0af32bde="" d="M512,670l-11.28-12.39L374.35,518.76l-23.22-25.51h34.5h40.3V363.1c0-15.34,13.61-27.35,30.99-27.35h110.16
			c17.38,0,30.98,12.02,30.98,27.35v130.15h40.3h34.5l-23.22,25.51L523.27,657.61L512,670L512,670z" style="fill: rgb(255, 255, 255);"></path>
                    <path data-v-0af32bde="" d="M582.8,508.5V363.1c0-6.68-7.04-12.1-15.73-12.1H456.92c-8.69,0-15.74,5.42-15.74,12.1v145.4h-55.55
			L512,647.35L638.36,508.5H582.8z" style="fill: rgb(214, 0, 0);"></path></g> <g data-v-0af32bde=""><path data-v-0af32bde="" d="M293.42,352.14H59.37c-17.77,0-32.22-14.68-32.22-32.72V185.24c0-18.05,14.45-32.73,32.22-32.73h234.05
			c17.77,0,32.23,14.68,32.23,32.73v134.17C325.64,337.46,311.19,352.14,293.42,352.14L293.42,352.14z" style="fill: rgb(255, 255, 255);"></path>
                    <path data-v-0af32bde="" d="M323.84,319.41c0,9.56-7.77,17.31-17.37,17.31H65.07c-9.59,0-17.37-7.75-17.37-17.31V185.24
			c0-9.56,7.77-17.31,17.37-17.31h241.4c9.59,0,17.37,7.75,17.37,17.31V319.41z" style="fill: rgb(214, 0, 0);"></path>
                    <g data-v-0af32bde="" id="_x3C_PDF_x3E_"><path data-v-0af32bde="" d="M70.58,200.09h30.51c9.26,0,16.45,0.76,21.55,2.29c5.1,1.53,9.38,4.99,12.85,10.37
				c3.47,5.38,5.2,12.06,5.2,20.01c0,7.65-1.4,13.98-4.2,18.98c-2.79,5-6.66,8.61-11.6,10.83c-4.95,2.22-12.54,3.33-22.79,3.33
				h-8.23v38.65H70.58V200.09z M93.88,217v31h7.22c6.37,0,10.47-1.46,12.31-4.37c1.84-2.92,2.76-6.7,2.76-11.35
				c0-3.94-0.71-7.12-2.13-9.55c-1.42-2.43-3.08-3.99-4.97-4.68c-1.89-0.69-4.54-1.03-7.96-1.03H93.88z" style="fill: rgb(255, 255, 255);"></path>
                      <path data-v-0af32bde="" d="M151.88,200.09h25.08c10.87,0,19.7,1.44,26.51,4.32c6.81,2.88,12.26,8.2,16.35,15.96
				c4.09,7.75,6.13,18.24,6.13,31.45c0,9.39-1.24,17.72-3.73,24.99c-2.49,7.27-5.75,13-9.78,17.18c-4.03,4.18-8.59,6.99-13.66,8.42
				c-5.08,1.43-11.42,2.14-19.03,2.14h-27.87V200.09z M175.17,218v68.65h3.97c5.4,0,9.58-1.02,12.54-3.07
				c2.96-2.04,5.32-5.61,7.09-10.69c1.76-5.08,2.65-12.43,2.65-22.03c0-8.89-0.97-15.73-2.92-20.54c-1.95-4.8-4.39-8.06-7.32-9.77
				c-2.93-1.71-6.94-2.57-12.03-2.57H175.17z" style="fill: rgb(255, 255, 255);"></path>
                      <path data-v-0af32bde="" d="M241.25,200.09h62.89V218h-39.6v27.32h30.52v17.91h-30.52v41.33h-23.29V200.09z" style="fill: rgb(255, 255, 255);"></path></g></g></g></svg>
                </div>
              </a>
            </td>
            <td class="text-center border border-golden cursor-pointer" @click="openPermalink(top)" v-if="!top.sold && top.status" v-text="translations.frei"></td>
            <td class="text-center border border-golden" v-if="!top.sold && top.status">
              <a :href="top.permalink" v-text="translations.details" class="underline"></a>
            </td>
          </tr>
        </transition>
        </tbody>
      </table>
      <!--    </div>-->
    </perfect-scrollbar>
  </div>
</template>

<script>
import VueSlider from 'vue-slider-component'

export default {
  name: "TopsTable",
  components: {VueSlider},
  props: ['tops', 'minPrice', 'maxPrice', 'minRent', 'maxRent', 'minRooms', 'maxRooms', 'minWfl', 'maxWfl'],

  data() {
    return {
      showFilter: false,
      price: [this.minPrice, this.maxPrice],
      rent: [this.minRent, this.maxRent],
      rooms: [this.minRooms, this.maxRooms],
      wfl: [this.minWfl, this.maxWfl],
      filteredTops: this.tops,
      frei: false,
      sorted: false,
      operator: '>',
      translations: translations
    }
  },

  methods: {

    openPermalink(top){

      if(!top.sold && !top.status || top.sold ) return;

      window.location = top.permalink;
    },
    resetFilters() {
      this.price = [this.minPrice, this.maxPrice];
      this.wfl = [this.minWfl, this.maxWfl];
      this.rooms = [this.minRooms, this.maxRooms];
      this.filter();
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


    calculateDivider(min, max) {

      if (min % 100000 == 0 && max % 100000 == 0) return 100000;
      if (min % 10000 == 0 && max % 10000 == 0) return 10000;
      if (min % 1000 == 0 && max % 1000 == 0) return 1000;
      if (min % 100 == 0 && max % 100 == 0) return 100;
      if (min % 10 == 0 && max % 10 == 0) return 10;
      return 1;

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

<style scoped>
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