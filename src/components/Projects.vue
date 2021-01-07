<template>
  <div class="projects">
    <Project v-for="(prj, i) in projects" :data="prj" :key="i"/>
  </div>
</template>

<script>
  import Project from '@/components/Project'
  import projects from '../data/projects'

  export default {
    name: "Projects",
    components: {Project},
    data() {
      return {
        projects: []
      }
    },
    mounted() {
      this.projects = projects
    }
  }
</script>
