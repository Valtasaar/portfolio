<template>
  <div class="project"
       :class="{'is-active': isActive, 'is-visible': isVisible}"
       :id="id"
       @mouseenter.prevent="isActive = true"
       @mouseleave.prevent="isActive = false"
  >
    <div class="project__image">
      <img :src="data.img" alt="google">
    </div>

    <div class="project__title"><span>{{ data.title }}</span></div>

    <div class="project__tags">
      <span v-for="(tag, i) in data.tags" :key="i">{{ tag }}</span>
    </div>

    <div class="project__buttons">
      <Button transparent yellowBorder small link :href="data.link">Visit site</Button>

      <Button v-if="data.git"
          transparent
          yellowBorder
          small
          link
          :href="data.git"
      >
        Open github
      </Button>
    </div>
  </div>
</template>

<script>
  import Button from '@/components/Button'
  import ScrollMagic from 'scrollmagic'

  export default {
    name: "Project",
    components: {Button},
    props: {
      data: Object
    },
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
