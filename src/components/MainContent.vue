<script setup>
import Projects from '@/components/Projects'
import Skills from '@/components/Skills'
import ContactForm from '@/components/ContactForm'
import ScrollMagic from 'scrollmagic'
import { onMounted } from 'vue'

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
          <h2>Some of my projects</h2>
        </div>

        <Projects />
      </div>
    </div>

    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>Skills & Experience</h2>

          <div class="content-section__subtitle">
            <h3>Facts only :-)</h3>
          </div>
        </div>

        <Skills />
      </div>
    </div>

    <div id="form-section" class="content-section content-section--two-cols content-section--form">
      <div class="content-section__wrap">
        <div class="content-section__col">
          <div class="content-section__title">
            <h2>Contact with me</h2>

            <div class="content-section__subtitle">
              <h3>If you have any question or proposals, please fill the form.</h3>
            </div>
          </div>

          <div class="content-section__text">
            <span>Also, you can find me on social:</span>

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
