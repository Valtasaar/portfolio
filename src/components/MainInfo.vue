<script setup>
defineProps({
  type: String
})
</script>

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

    <div class="header__bottom">
      <div class="header__social">
        <span>
          <a href="https://www.linkedin.com/in/daniil-kirienko-911563203" title="linkedin" target="_blank">
            <i class="fab fa-linkedin" />
          </a>
        </span>

        <span>
          <a href="https://www.facebook.com/d.valtasaar" title="facebook" target="_blank">
            <i class="fab fa-facebook-square" />
          </a>
        </span>

        <span>
          <a href="https://twitter.com/DValtasaar" title="twitter" target="_blank">
            <i class="fab fa-twitter-square" />
          </a>
        </span>

        <span>
          <a href="https://vk.com/id70376653" title="vkontakte" target="_blank">
            <i class="fab fa-vk"></i>
          </a>
        </span>

<!--        <div class="header__lang">
          <a href="#" @click.prevent="lang === 'en' ? lang = 'ru' : lang = 'en'">
            {{ lang.value === 'en' ? 'Русский' : 'English' }}
          </a>
        </div>-->
      </div>
    </div>
  </div>
</template>
