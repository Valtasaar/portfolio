<template>
  <div class="skills-container">
    <div class="skills">
      <div class="skill" v-for="skill in skills" :key="skill.title">
        <div class="skill__icon" v-html="skill.icon"></div>

        <div class="skill__title">
          <span>{{ skill.title }}</span>
        </div>

        <div class="skill__text">
          <p>
            {{ skill.text }}
          </p>
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

  export default {
    name: "Skills",
    components: {CircleChart},
    data() {
      return {
        skills: skills
      }
    },
  }
</script>
