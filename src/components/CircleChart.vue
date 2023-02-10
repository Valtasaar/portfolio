<template>
  <div
    :id="id"
    class="circle-chart"
  >
    <div class="circle-chart__wrap">
      <div class="circle-chart__chart">
        <svg
          :viewbox="`0 0 ${size} ${size}`"
          :width="containerSize"
          :height="containerSize"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle
            class="circle-chart__background"
            fill="none"
            :stroke-width="bgWidth"
            :cx="wrapSize"
            :cy="wrapSize"
            :r="circleSize"
          />

          <circle
            class="circle-chart__circle"
            fill="none"
            :stroke-width="width"
            :stroke-dasharray="`${percent},${circumference}`"
            :cx="wrapSize"
            :cy="wrapSize"
            :r="circleSize"
          />
        </svg>

        <span class="circle-chart__percent">{{ count.toFixed(0) }}%</span>
      </div>

      <span class="circle-chart__title">{{ title }}</span>
    </div>
  </div>
</template>

<script>
import gsap from 'gsap'
import ScrollMagic from 'scrollmagic'

export default {
  name: 'CircleDiagram',
  props: {
    size: Number,
    value: Number,
    width: Number,
    bgWidth: Number,
    title: String
  },
  data () {
    return {
      count: 0,
      id: 'chart-' + this.$.uid
    }
  },
  computed: {
    circleSize () {
      return this.size / 2
    },
    percent () {
      return this.count / 100 * this.circumference
    },
    wrapSize () {
      return (this.size / 2) + (this.width / 2)
    },
    containerSize () {
      return this.size + this.width
    },
    circumference () {
      return 2 * Math.PI * (this.size / 2)
    }
  },
  mounted () {
    if (document.getElementById(this.id)) {
      const controller = new ScrollMagic.Controller()

      const chartScene = new ScrollMagic.Scene({
        triggerElement: document.getElementById(this.id)
      })
        .setClassToggle(document.getElementById(this.id), 'is-visible')
        .triggerHook(1)
        .offset(50)
        .addTo(controller)

      chartScene.on('enter', () => {
        gsap.to(this.$data, { duration: 0.8, count: this.value })
      })

      chartScene.on('leave', () => {
        gsap.to(this.$data, { duration: 0.8, count: 0 })
      })
    }
  }
}
</script>
