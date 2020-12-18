<template>
  <button class="button"
          :class="{
            'button--transparent': transparent,
            'button--small': small,
            'button--medium': medium,
            'button--yellow-border': yellowBorder,
            'button--white-border': whiteBorder,
            'button--form': form,
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
      link: Boolean,
      href: String,
      transparent: Boolean,
      small: Boolean,
      medium: Boolean,
      yellowBorder: Boolean,
      whiteBorder: Boolean,
      form: Boolean
    }
  }
</script>
