<template>
  <div class="project"
       :class="{'is-active': isActive}"
       @mouseenter.prevent="isActive = true"
       @mouseleave.prevent="isActive = false"
  >
    <div class="project__image">
      <img src="/images/projects/Screenshot_1.png" alt="google">
    </div>

    <div class="project__title"><span>Google search</span></div>

    <div class="project__tags">
      <span>React</span>
      <span>Vue</span>
      <span>Tag</span>
    </div>

    <div class="project__buttons">
      <Button transparent yellowBorder small>Visit site</Button>
      <Button transparent yellowBorder small link href="https://github.com">Open github</Button>
    </div>
  </div>
</template>

<script>
  import Button from '@/components/Button'

  export default {
    name: "Project",
    components: {Button},
    data() {
      return {
        isActive: false
      }
    },
  }
</script>
