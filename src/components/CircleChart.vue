<script setup>
import * as Vue from 'vue'
import { reactive, computed, onMounted } from 'vue'
import gsap from 'gsap'
import ScrollMagic from 'scrollmagic'

const currentInstance = Vue.getCurrentInstance()

const props = defineProps({
  size: Number,
  value: Number,
  width: Number,
  bgWidth: Number,
  title: String
})

const data = reactive({
  count: 0,
  id: 'chart-' + currentInstance.uid
})

const circleSize = computed(() => props.size / 2)
const percent = computed(() => data.count / 100 * circumference.value)
const wrapSize = computed(() => ( props.size / 2 ) + ( props.width / 2 ))
const containerSize = computed(() => props.size + props.width)
const circumference = computed(() => 2 * Math.PI * ( props.size / 2 ))

onMounted(() => {
  if ( document.getElementById(data.id) ) {
    const controller = new ScrollMagic.Controller()

    const chartScene = new ScrollMagic.Scene({
      triggerElement: document.getElementById(data.id)
    })
    .setClassToggle(document.getElementById(data.id), 'is-visible')
    .triggerHook(1)
    .offset(50)
    .addTo(controller)

    chartScene.on('enter', () => {
      gsap.to(data, { duration: 0.8, count: props.value })
    })

    chartScene.on('leave', () => {
      gsap.to(data, { duration: 0.8, count: 0 })
    })
  }
})
</script>

<template>
  <div :id="data.id" class="circle-chart">
    <div class="circle-chart__wrap">
      <div class="circle-chart__chart">
        <svg :viewbox="`0 0 ${size} ${size}`"
             :width="containerSize"
             :height="containerSize"
             xmlns="http://www.w3.org/2000/svg"
        >
          <circle class="circle-chart__background"
                  fill="none"
                  :stroke-width="bgWidth"
                  :cx="wrapSize"
                  :cy="wrapSize"
                  :r="circleSize"
          />

          <circle class="circle-chart__circle"
                  fill="none"
                  :stroke-width="width"
                  :stroke-dasharray="`${percent},${circumference}`"
                  :cx="wrapSize"
                  :cy="wrapSize"
                  :r="circleSize"
          />
        </svg>

        <span class="circle-chart__percent">{{ data.count.toFixed(0) }}%</span>
      </div>

      <span class="circle-chart__title">{{ title }}</span>
    </div>
  </div>
</template>
