<template>
  <header class="header">
    <div class="header__wrap">
      <div class="header__menu-toggler">
        <button class="hamburger hamburger--spring"
                :class="{'is-active': isMenuOpen}"
                @click="isMenuOpen = !isMenuOpen"
        >
          <span class="hamburger-box">
            <span class="hamburger-inner" />
          </span>
        </button>
      </div>

      <MainInfo type="header" />

      <Menu v-model="isMenuOpen" />
    </div>
  </header>
</template>

<script>
import Menu from '@/components/Menu'
import MainInfo from '@/components/MainInfo'

export default {
  name: 'Header',
  components: { Menu, MainInfo },
  data() {
    return {
      isMenuOpen: false
    }
  }
}
</script>
