<script setup>
import dictionary from '../data/dictionary.json'
import { computed, inject, onMounted } from 'vue'
import ScrollMagic from 'scrollmagic'
import Projects from '@/components/Projects'
import Skills from '@/components/Skills'
import ContactForm from '@/components/ContactForm'

const { lang } = inject('lang')

const projectsTitle = computed(() => lang.value === 'en' ? dictionary.projectsTitle.en : dictionary.projectsTitle.ru)
const skillsTitle = computed(() => lang.value === 'en' ? dictionary.skills.en : dictionary.skills.ru)
const contactTitle = computed(() => lang.value === 'en' ? dictionary.contact.en : dictionary.contact.ru)
const contactText = computed(() => lang.value === 'en' ? dictionary.contactText.en : dictionary.contactText.ru)
const contactSocial = computed(() => lang.value === 'en' ? dictionary.contactSocial.en : dictionary.contactSocial.ru)

onMounted(() => {
  if ( document.getElementById('form-section') ) {
    const controller = new ScrollMagic.Controller()

    new ScrollMagic.Scene({
      triggerElement: document.getElementById('form-section')
    })
    .setClassToggle(document.getElementById('form-section'), 'is-visible')
    .triggerHook(1)
    .offset(200)
    .addTo(controller)
  }
})
</script>

<template>
  <div class="content">
    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>{{ projectsTitle }}</h2>
        </div>

        <Projects />
      </div>
    </div>

    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>{{ skillsTitle }}</h2>
        </div>

        <Skills />
      </div>
    </div>

    <div id="form-section" class="content-section content-section--two-cols content-section--form">
      <div class="content-section__wrap">
        <div class="content-section__col">
          <div class="content-section__title">
            <h2>{{ contactTitle }}</h2>

            <div class="content-section__subtitle">
              <h3>{{ contactText }}</h3>
            </div>
          </div>

          <div class="content-section__text">
            <span>{{ contactSocial }}:</span>

            <ul>
              <li>
                <a class="link link--white"
                   href="https://www.linkedin.com/in/daniil-kirienko-911563203"
                   title="linked"
                   target="_blank"
                >
                  Linkedin
                </a>
              </li>

              <li>
                <a class="link link--white"
                   href="https://www.facebook.com/d.valtasaar"
                   title="fb"
                   target="_blank"
                >
                  Facebook
                </a>
              </li>
              <li>
                <a class="link link--white"
                   href="https://twitter.com/DValtasaar"
                   title="tw"
                   target="_blank"
                >
                  Twitter
                </a>
              </li>

              <li>
                <a class="link link--white"
                   href="https://vk.com/id70376653"
                   title="vk"
                   target="_blank"
                >
                  VK
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="content-section__col">
          <ContactForm />
        </div>
      </div>
    </div>
  </div>
</template>
