<script setup>
import { reactive } from 'vue'
import Menu from '@/components/Menu'
import MainInfo from '@/components/MainInfo'

const data = reactive({
  isMenuOpen: false
})
</script>

<template>
  <header class="header">
    <div class="header__wrap">
      <div class="header__menu-toggler">
        <button class="hamburger hamburger--spring"
                :class="{'is-active': data.isMenuOpen}"
                @click="data.isMenuOpen = !data.isMenuOpen"
        >
          <span class="hamburger-box">
            <span class="hamburger-inner" />
          </span>
        </button>
      </div>

      <MainInfo type="header" />

      <Menu v-model="data.isMenuOpen" />
    </div>
  </header>
</template>
