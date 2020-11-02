<template>
  <button class="button"
          :class="{
            'button--transparent': transparent,
            'button--small': small
          }"
  >
    <a v-if="link" :href="href" target="_blank"><slot></slot></a>
    <span v-else><slot></slot></span>
  </button>
</template>

<script>
  export default {
    name: "Button",
    props: {
      transparent: Boolean,
      small: Boolean,
      link: Boolean,
      href: String
    }
  }
</script>