<template>
  <div class="iCountUp">
    <ICountUp
        :delay="delay"
        :endVal="endVal"
        :options="options"
        @ready="onReady"
        class="text-5xl font-bold"
    />
  </div>
</template>

<script type="text/babel">
import ICountUp from 'vue-countup-v2';
export default {
  name: 'demo',
  props: ['endVal', 'delay'],
  components: {
    ICountUp
  },
  data() {
    return {
      options: {
        useEasing: true,
        useGrouping: true,
        separator: ',',
        decimal: '.',
        prefix: '',
        suffix: ''
      }
    };
  },
  methods: {
    // onReady: function(instance, CountUp) {
    //   const that = this;
    //   instance.update(that.endVal + 100);
    // }
  }
};
</script>

<style scoped lang="scss">
.iCountUp {
  font-size: 6rem;
  font-weight: bold;
  margin: 0;
  color: #4d63bc;
}
</style>
