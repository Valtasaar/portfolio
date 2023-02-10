<template>
  <a
    v-if="link"
    :href="href"
    class="button"
    :class="{
      'button--transparent': transparent,
      'button--small': small,
      'button--medium': medium,
      'button--yellow-border': yellowBorder,
      'button--white-border': whiteBorder,
      'button--form': form,
    }"
    target="_blank"
  >
    <slot />
  </a>

  <button
    v-else
    class="button"
    :disabled="disabled"
    :class="{
      'button--transparent': transparent,
      'button--small': small,
      'button--medium': medium,
      'button--yellow-border': yellowBorder,
      'button--white-border': whiteBorder,
      'button--form': form,
    }"
  >
    <span>
      <slot />
    </span>
  </button>
</template>

<script>
export default {
  name: 'Button',
  props: {
    link: Boolean,
    href: String,
    transparent: Boolean,
    small: Boolean,
    medium: Boolean,
    yellowBorder: Boolean,
    whiteBorder: Boolean,
    form: Boolean,
    disabled: Boolean
  }
}
</script>
