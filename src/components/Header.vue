<template>
  <header class="header">
    <div class="header__wrap">
      <div class="header__menu-toggler">
        <button class="hamburger hamburger--spring" :class="{'is-active': isMenuOpen}"
                @click="this.isMenuOpen = !isMenuOpen">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
        </button>
      </div>

      <Menu v-model="isMenuOpen"/>
    </div>
  </header>
</template>

<script>
  import Menu from  '@/components/Menu'

  export default {
    name: "Header",
    components: {Menu},
    data() {
      return {
        isMenuOpen: false
      }
    },
  }
</script>