<template>
  <header class="header">
    <div class="header__menu-toggler">
      <button class="hamburger hamburger--spring" @click="this.isMenuOpen = !isMenuOpen">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
      </button>
    </div>

    <Menu v-model="isMenuOpen"/>
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