<script setup>
import { inject } from 'vue'
import dictionary from '../data/dictionary.json'

defineProps({
  type: String
})

const { lang, setLang } = inject('lang')

function changeLang() {
  lang.value === 'en' ? setLang('ru') : setLang('en')
}
</script>

<template>
  <div class="main-info"
       :class="{'main-info--header': type === 'header'}"
  >
    <ul>
      <li>
        <span>{{ lang === 'en' ? 'My name' : 'Имя' }}</span>
        <span>{{ lang === 'en' ? dictionary.name.en : dictionary.name.ru }}</span>
      </li>

      <li>
        <span>{{ lang === 'en' ? 'Role' : 'Специализация' }}</span>
        <span>{{ lang === 'en' ? dictionary.role.en : dictionary.role.ru }}</span>
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

        <span>
          <a href="https://t.me/daniilkirien" title="vkontakte" target="_blank">
            <i class="fab fa-telegram"></i>
          </a>
        </span>
      </div>

      <div class="header__lang">
        <a href="#" @click.prevent="changeLang">
          {{ lang === 'en' ? 'Русский' : 'English' }}
        </a>
      </div>
    </div>
  </div>
</template>
