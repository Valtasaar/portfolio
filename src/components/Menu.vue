<template>
  <div class="menu" :class="{'is-active': modelValue}">
    <ul>
      <li><a href="#" title="Projects">Projects</a></li>
      <li><a href="#" title="Contacts">Contacts</a></li>
    </ul>

    <div class="menu__social">
      <span><a href="#" title="vkontakte"><i class="fab fa-vk"></i></a></span>
      <span><a href="#" title="facebook"><i class="fab fa-facebook-square"></i></a></span>
      <span><a href="#" title="twitter"><i class="fab fa-twitter-square"></i></a></span>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Menu",
    props: {
      modelValue: Boolean
    }
  }
</script>