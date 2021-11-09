<template>
  <div class="p-3" >
    <h2 class="text-2xl text-golden mb-3">Filtern</h2>
    <div class="grid grid-cols-1">

      <div class="col-span-1 mb-3" v-if="maxPrice != 0 && minPrice != 0">
        <p class="text-primary">Preis</p>
        <p class="text-primary">{{ euro(price[0]) }} - {{ euro(price[1]) }}</p>
        <div class="px-3">
          <vue-slider
              :min="minPrice"
              :max="maxPrice"
              :interval="calculateDivider(minPrice, maxPrice)"
              tooltip="none"
              :dotSize="25"
              v-model="price"
              @change="emitData">
          </vue-slider>
        </div>
      </div>

      <div class="col-span-1 mb-3" v-if="maxRent != 0 && minRent != 0">
        <div class="flex justify-between">
          <div class="text-primary">Miete</div>
          <div class="text-primary">{{ euro(rent[0]) }} - {{ euro(rent[1]) }}</div>
        </div>
        <div class="px-3">
          <vue-slider
              :min="minRent"
              :max="maxRent"
              :interval="calculateDivider(minRent, maxRent)"
              tooltip="none"
              :dotSize="25"
              v-model="rent"
              @change="emitData">
          </vue-slider>
        </div>
      </div>


      <div class="col-span-1 mb-3">
        <div class="flex justify-between">
          <div class="text-primary">Wohnfläche</div>
          <div class="text-primary">{{ wfl[0] }} m² - {{ wfl[1] }} m²</div>
        </div>
        <div class="px-3">
          <vue-slider
              :min="minWfl"
              :max="maxWfl"
              :interval="calculateDivider(minWfl, maxWfl)"
              tooltip="none"
              :dotSize="25"
              v-model="wfl"
              @change="emitData">
          </vue-slider>
        </div>
      </div>

      <div class="col-span-1 mb-3">
        <div class="flex justify-between">
          <div class="text-primary">Zimmer</div>
          <div class="text-primary">{{ rooms[0] }} - {{ rooms[1] }}</div>
        </div>
        <div class="px-3">
          <vue-slider
              :min="minRooms"
              :max="maxRooms"
              :interval="1"
              tooltip="none"
              :dotSize="25"
              v-model="rooms"
              @change="emitData">
          </vue-slider>
        </div>
      </div>
      <div class="col-span-1 mb-3">
        <label>
          <input type="checkbox" v-model="frei"
                 @change="emitData"> Nur freie anzeigen
        </label>
      </div>


      <div class="col-span-1 mb-3">
        <div class="text-golden">
          <div class="bg-golden text-white py-2 px-5 cursor-pointer text-center inline" @click="resetFilters">zurücksetzten</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueSlider from 'vue-slider-component'


export default {
  name: "TableFilters",
  props: ['minPrice', 'maxPrice', 'minRent', 'maxRent', 'minRooms', 'maxRooms', 'minWfl', 'maxWfl'],
  components: {
    VueSlider
  },
  data() {
    return {
      price: [this.minPrice, this.maxPrice],
      rent: [this.minRent, this.maxRent],
      rooms: [this.minRooms, this.maxRooms],
      wfl: [this.minWfl, this.maxWfl],
      frei: false
    }
  },
  methods: {
    emitData() {
      this.$root.$emit('tableFilter', {
        price: this.price,
        rent: this.rent,
        rooms: this.rooms,
        wfl: this.wfl,
        frei: this.frei
      })
    },
    calculateDivider(min, max) {

      if (min % 100000 == 0 && max % 100000 == 0) return 100000;
      if (min % 10000 == 0 && max % 10000 == 0) return 10000;
      if (min % 1000 == 0 && max % 1000 == 0) return 1000;
      if (min % 100 == 0 && max % 100 == 0) return 100;
      if (min % 10 == 0 && max % 10 == 0) return 10;
      return 1;

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
    resetFilters() {
      this.price = [this.minPrice, this.maxPrice];
      this.wfl = [this.minWfl, this.maxWfl];
      this.rooms = [this.minRooms, this.maxRooms];
      this.frei = false;
      this.emitData();
    },

  }
}
</script>

<style scoped lang="scss">

</style>