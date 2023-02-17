<script setup>
import * as Vue from 'vue'
import { onMounted, reactive } from 'vue'
import ScrollMagic from 'scrollmagic'
import skills from '../data/skills'
import CircleChart from './CircleChart'

const data = reactive({
  skills,
  id: 'skill-' + Vue.getCurrentInstance().uid
})

onMounted(() => {
  if ( data.skills.length ) {
    const controller = new ScrollMagic.Controller()

    for ( let i = 0; i < data.skills.length; i++ ) {
      new ScrollMagic.Scene({
        triggerElement: document.getElementById(`skill-${i}`)
      })
      .setClassToggle(document.getElementById(`skill-${i}`), 'is-visible')
      .triggerHook(1)
      .offset(50)
      .addTo(controller)
    }
  }
})
</script>

<template>
  <div class="skills-container">
    <div class="skills">
      <div class="skill"
           :class="{'skill--additional': skill.title === 'Additional'}"
           :id="`skill-${i}`"
           v-for="(skill, i) in data.skills" :key="skill.title"
      >
        <div class="skill__icon" v-html="skill.icon" />

        <div class="skill__title">
          <span>{{ skill.title }}</span>
        </div>

        <div class="skill__text">
          <div v-html="skill.text" />
        </div>
      </div>
    </div>

    <div class="skills__charts">
      <CircleChart :size="150" :value="94" :width="30" :bg-width="18" title="HTML/CSS" />
      <CircleChart :size="150" :value="73" :width="30" :bg-width="18" title="JavaScript" />
      <CircleChart :size="150" :value="36" :width="30" :bg-width="18" title="Backend" />
    </div>
  </div>
</template>
