<template>
  <div class="skills-container">
    <div class="skills">
      <div class="skill"
           :class="{'skill--additional': skill.title === 'Additional'}"
           :id="`skill-${i}`"
           v-for="(skill, i) in skills" :key="skill.title"
      >
        <div class="skill__icon" v-html="skill.icon"></div>

        <div class="skill__title">
          <span>{{ skill.title }}</span>
        </div>

        <div class="skill__text">
          <div v-html="skill.text"></div>
        </div>
      </div>
    </div>

    <div class="skills__charts">
      <CircleChart :size="150" :value="94" :width="30" :bg-width="18" title="HTML/CSS"></CircleChart>
      <CircleChart :size="150" :value="73" :width="30" :bg-width="18" title="JavaScript"></CircleChart>
      <CircleChart :size="150" :value="36" :width="30" :bg-width="18" title="Backend"></CircleChart>
    </div>
  </div>
</template>

<script>
import skills from '../data/skills'
import CircleChart from './CircleChart'
import ScrollMagic from 'scrollmagic'

export default {
  name: 'Skills',
  components: { CircleChart },
  data() {
    return {
      skills: skills,
      id: 'skill-' + this.$.uid
    }
  },
  mounted() {
    if ( this.skills.length ) {
      const controller = new ScrollMagic.Controller();

      for ( let i = 0; i < this.skills.length; i++ ) {
        new ScrollMagic.Scene({
          triggerElement: document.getElementById(`skill-${i}`)
        })
            .setClassToggle(document.getElementById(`skill-${i}`), "is-visible")
            .triggerHook(1)
            .offset(50)
            .addTo(controller)
      }
    }
  }
}
</script>
