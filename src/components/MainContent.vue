<template>
  <div class="content">
    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>My featured projects</h2>
        </div>

        <Projects/>
      </div>
    </div>

    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>Skills & Experience</h2>
        </div>

        <Skills/>
      </div>
    </div>
  </div>
</template>

<script>
  import Projects from '@/components/Projects'
  import Skills from '@/components/Skills'

  export default {
    name: "MainContent",
    components: {Projects, Skills}
  }
</script>
