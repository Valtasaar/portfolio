<script setup>
import MainInfo from '@/components/MainInfo'

defineProps({
  modelValue: Boolean
})
</script>

<template>
  <div class="menu" :class="{'is-active': modelValue}">
    <MainInfo />
  </div>
</template>
