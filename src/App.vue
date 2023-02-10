<script setup>
import MainLayout from './views/Main'
import { provide } from 'vue'

provide('message', 'hello!')
</script>

<template>
  <MainLayout />
</template>
