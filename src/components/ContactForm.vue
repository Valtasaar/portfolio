<template>
  <div class="form">
    <Input @update="nameUpdate"
           name="name"
           title="Name"
           placeholder="Enter your name"
           :error="errors.name"
    />

    <Input @update="emailUpdate"
           title="Email"
           type="email"
           placeholder="Enter your email"
           :error="errors.email"
    />

    <Textarea @update="textUpdate"
              title="Message"
              name="text"
              placeholder="Enter text"
              :error="errors.text"
    />

    <Button transparent
            whiteBorder
            medium
            form
            :disabled="isError"
            @click.prevent="submit"
    >Send</Button>

    <div class="form__error" v-if="isError">
      <span>Something went wrong! Please check all fields</span>
    </div>
  </div>
</template>

<script>
  import Input from '@/components/Input'
  import Textarea from '@/components/Textarea'
  import Button from '@/components/Button'
  import { required, email } from '@vuelidate/validators'
  import nodemailer from 'nodemailer'

  export default {
    name: "ContactForm",
    components: {Input, Textarea, Button},
    data() {
      return {
        name: '',
        email: '',
        text: '',
        errors: {
          name: '',
          email: '',
          text: ''
        }
      }
    },
    methods: {
      nameUpdate(value) {
        this.name = value
        this.$v.name.$touch()

        if ( this.$v.name.$error ) {
          this.errors.name = this.$v.name.$errors[0].$message
        } else {
          this.errors.name = ''
        }
      },
      emailUpdate(value) {
        this.email = value
        this.$v.email.$touch()

        if ( this.$v.email.$error ) {
          this.errors.email = this.$v.email.$errors[0].$message
        } else {
          this.errors.email = ''
        }
      },
      textUpdate(value) {
        this.text = value
        this.$v.text.$touch()

        if ( this.$v.text.$error ) {
          this.errors.text = this.$v.text.$errors[0].$message
        } else {
          this.errors.text = ''
        }
      },
      submit() {
        this.nameUpdate(this.name)
        this.emailUpdate(this.email)
        this.textUpdate(this.text)

        if ( !this.isError ) {
          this.sendForm()
        }
      },
      sendForm() {
        console.log('send');

        let transporter = nodemailer.createTransport({
          host: "mail.hostland.ru",
          port: 465,
          secure: true,
          auth: {
            user: "info@daniweb.ru",
            pass: "Ejv7npuFSq"
          }
        });

        console.log(transporter);
      }
    },
    computed: {
      isError() {
        return this.$v.$invalid;
      }
    },
    validations () {
      return {
        name: {required},
        text: {required},
        email: {required, email}
      }
    }
  }
</script>
