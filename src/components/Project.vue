<script setup>
import * as Vue from 'vue'
import { onMounted, reactive } from 'vue'
import ScrollMagic from 'scrollmagic'
import Button from '@/components/Button'

defineProps({
  info: Object
})

const data = reactive({
  isActive: false,
  isVisible: false,
  id: 'project-' + Vue.getCurrentInstance().uid
})

onMounted(() => {
  if ( document.getElementById(data.id) ) {
    const controller = new ScrollMagic.Controller()

    const projectScene = new ScrollMagic.Scene({
      triggerElement: document.getElementById(data.id)
    })
    .triggerHook(1)
    .offset(50)
    .addTo(controller)

    projectScene.on('enter', () => {
      data.isVisible = true
    })

    projectScene.on('leave', () => {
      data.isVisible = false
    })
  }
})
</script>

<template>
  <div class="project"
       :class="{'is-active': data.isActive, 'is-visible': data.isVisible}"
       :id="data.id"
       tabindex="0"
       @mouseenter.prevent="data.isActive = true"
       @mouseleave.prevent="data.isActive = false"
       @click.self.prevent="data.isActive = true"
  >
    <div class="project__image">
      <img :src="info.img" alt="google">
    </div>

    <div class="project__title">
      <span>{{ info.title }}</span>
    </div>

    <div class="project__tags">
      <span v-for="(tag, i) in info.tags" :key="i">{{ tag }}</span>
    </div>

    <div class="project__buttons">
      <Button transparent yellowBorder small link :href="info.link">
        Visit site
      </Button>

      <Button v-if="info.git"
              transparent
              yellowBorder
              small
              link
              :href="info.git"
      >
        Open github
      </Button>
    </div>
  </div>
</template>
