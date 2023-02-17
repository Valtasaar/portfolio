<script setup>
import { provide, ref } from 'vue'
import MainLayout from './views/Main'

const lang = ref(getLang())

function getLang() {
  const localLang = localStorage.getItem('lang')

  if ( localLang )
    return localLang
  else
    return window.navigator.languages[1]
}

function setLang(value) {
  lang.value = value
  localStorage.setItem('lang', value)
}

provide('lang', { lang, setLang })
</script>

<template>
  <MainLayout />
</template>
