<template>
  <div class="project"
       :class="{'is-active': isActive, 'is-visible': isVisible}"
       :id="id"
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
  import ScrollMagic from 'scrollmagic'

  export default {
    name: "Project",
    components: {Button},
    data() {
      return {
        isActive: false,
        isVisible: false,
        id: 'project-' + this.$.uid
      }
    },
    mounted() {
      if ( document.getElementById(this.id) ) {
        const controller = new ScrollMagic.Controller();

        const projectScene = new ScrollMagic.Scene({
          triggerElement: document.getElementById(this.id)
        })
          .triggerHook(1)
          .offset(50)
          .addTo(controller)

        projectScene.on("enter", () => {
          this.isVisible = true
        });

        projectScene.on("leave", () => {
          this.isVisible = false
        });
      }
    }
  }
</script>
