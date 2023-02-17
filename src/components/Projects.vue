<script setup>
import Project from '@/components/Project'
import projects from '../data/projects'
import { onMounted, reactive } from 'vue'

const data = reactive({
  projects: []
})

onMounted(() => {
  data.projects = projects
})
</script>

<template>
  <div class="projects">
    <Project v-for="(prj, i) in data.projects" :info="prj" :key="'project' + i" />
  </div>
</template>
