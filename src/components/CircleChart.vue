<template>
  <div class="circle-chart">
    <div class="circle-chart__wrap">
      <div class="circle-chart__chart">
        <svg :viewbox="`0 0 ${size} ${size}`"
             :width="containerSize" :height="containerSize"
             xmlns="http://www.w3.org/2000/svg"
        >
          <circle class="circle-chart__background"
                  fill="none"
                  :stroke-width="bgWidth"
                  :cx="wrapSize"
                  :cy="wrapSize"
                  :r="circleSize">
          </circle>

          <circle class="circle-chart__circle"
                  fill="none"
                  :stroke-width="width"
                  :stroke-dasharray="`${percent},${circumference}`"
                  :cx="wrapSize"
                  :cy="wrapSize"
                  :r="circleSize">
          </circle>
        </svg>

        <span class="circle-chart__percent">{{ value }}%</span>
      </div>

      <span class="circle-chart__title">{{ title }}</span>
    </div>
  </div>
</template>

<script>
  export default {
    name: "CircleDiagram",
    props: {
      'size': Number,
      'value': Number,
      'width': Number,
      'bgWidth': Number,
      'title': String
    },
    data() {
      return {
      }
    },
    computed: {
      circleSize() {
        return this.size / 2
      },
      percent() {
        return this.value / 100 * this.circumference
      },
      wrapSize() {
        return (this.size / 2) + (this.width / 2)
      },
      wrapBgSize() {
        return (this.size / 2) + (this.bgWidth / 2)
      },
      containerSize() {
        return this.size + this.width
      },
      circumference () {
        return 2 * Math.PI * (this.size / 2);
      }
    }
  }
</script>
