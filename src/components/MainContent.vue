<template>
  <div class="content">
    <div class="content-section">
      <div class="content-section__title">
        <h2>My featured projects</h2>
      </div>

      <Projects/>
    </div>
  </div>
</template>

<script>
  import Projects from '@/components/Projects'

  export default {
    name: "MainContent",
    components: {Projects}
  }
</script>