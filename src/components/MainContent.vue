<template>
  <div class="content">
    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>Introduction</h2>
        </div>

        <div class="content-section__text">
          Hi there!
        </div>
      </div>
    </div>

    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>My featured projects</h2>
        </div>

        <Projects/>
      </div>
    </div>

    <div class="content-section">
      <div class="content-section__wrap">
        <div class="content-section__title">
          <h2>Skills & Experience</h2>
        </div>

        <Skills/>
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
              <li><a class="link link--white" href="#" title="fb">Facebook</a></li>
              <li><a class="link link--white" href="#" title="tw">Twitter</a></li>
              <li><a class="link link--white" href="#" title="vk">VK</a></li>
            </ul>
          </div>
        </div>

        <div class="content-section__col">
          <ContactForm/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Projects from '@/components/Projects'
  import Skills from '@/components/Skills'
  import ContactForm from '@/components/ContactForm'
  import ScrollMagic from 'scrollmagic'

  export default {
    name: "MainContent",
    components: {Projects, Skills, ContactForm},
    mounted() {
      if ( document.getElementById('form-section') ) {
        const controller = new ScrollMagic.Controller();

        new ScrollMagic.Scene({
          triggerElement: document.getElementById('form-section')
        })
          .setClassToggle(document.getElementById('form-section'), "is-visible")
          .triggerHook(1)
          .offset(200)
          .addTo(controller)
      }
    }
  }
</script>
