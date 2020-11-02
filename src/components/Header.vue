<template>
  <header class="header">
    <div class="header__wrap">
      <div class="header__menu-toggler">
        <button class="hamburger hamburger--spring"
                :class="{'is-active': isMenuOpen}"
                @click="this.isMenuOpen = !isMenuOpen"
        >
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>

      <div class="header__user-info">
        <ul>
          <li>
            <span>My name</span>
            <span>User Name</span>
          </li>

          <li>
            <span>Role</span>
            <span>WEB Developer</span>
          </li>

          <li>
            <span>Email</span>
            <span>daniil.kirien@gmail.com</span>
          </li>
        </ul>

        <div class="header__social">
          <span><a href="#" title="vkontakte"><i class="fab fa-vk"></i></a></span>
          <span><a href="#" title="facebook"><i class="fab fa-facebook-square"></i></a></span>
          <span><a href="#" title="twitter"><i class="fab fa-twitter-square"></i></a></span>
        </div>
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