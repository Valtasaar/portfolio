<script setup>
import * as Vue from 'vue'
import { inject, onMounted, reactive } from 'vue'
import ScrollMagic from 'scrollmagic'
import skills from '../data/skills'
import { years } from '@/plural'
import CircleChart from './CircleChart'

const { lang } = inject('lang')

const data = reactive({
  skills,
  id: 'skill-' + Vue.getCurrentInstance().uid,
  htmlStart: 2016,
  jsStart: 2018,
  reactVueStart: 2020
})

function subStr(str, type) {
  const start = type === 'html'
      ? data.htmlStart
      : type === 'js'
          ? data.jsStart
          : data.reactVueStart
  const yearsCount = new Date().getFullYear() - start

  return str.replace('{years}', `${yearsCount} ${years(yearsCount, lang.value)}`)
}

function skillText(text, title) {
  let type = ''

  switch ( title ) {
    case 'HTML5, CSS3':
      type = 'html'
      break
    case 'JavaScript':
      type = 'js'
      break
  }

  if ( lang.value === 'en' )
    return subStr(text.en, type)
  else
    return subStr(text.ru, type)
}

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
          <div v-html="skillText(skill.text, skill.title)" />
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
