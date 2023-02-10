<template>
  <div class="menu" :class="{'is-active': modelValue}">
    <MainInfo />
  </div>
</template>

<script>
import MainInfo from '@/components/MainInfo'

export default {
  name: 'Menu',
  components: { MainInfo },
  props: {
    modelValue: Boolean
  }
}
</script>
