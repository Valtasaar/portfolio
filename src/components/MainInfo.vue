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
      <span><a href="https://www.linkedin.com/in/daniil-kirienko-911563203" title="linkedin" target="_blank"><i class="fab fa-linkedin"></i></a></span>
      <span><a href="https://www.facebook.com/d.valtasaar" title="facebook" target="_blank"><i class="fab fa-facebook-square"></i></a></span>
      <span><a href="https://twitter.com/DValtasaar" title="twitter" target="_blank"><i class="fab fa-twitter-square"></i></a></span>
      <span><a href="https://vk.com/id70376653" title="vkontakte" target="_blank"><i class="fab fa-vk"></i></a></span>
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
