<template>
  <div class="main-info"
       :class="{'main-info--header': type === 'header'}"
  >
    <ul>
      <li>
        <span>My name</span>
        <span>Daniil Kirienko</span>
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
</template>

<script>
  export default {
    name: "MainInfo",
    props: {
      type: String
    }
  }
</script>
