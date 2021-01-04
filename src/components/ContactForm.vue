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

    <div class="form__info form__info--error" v-if="isError">
      <span>Something went wrong! Please check all fields</span>
    </div>

    <div class="form__info form__info--success" v-if="isSuccess">
      <span>Your message has been sent!</span>
    </div>
  </div>
</template>

<script>
  import Input from '@/components/Input'
  import Textarea from '@/components/Textarea'
  import Button from '@/components/Button'
  import { required, email } from '@vuelidate/validators'
  import axios from 'axios'

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
        },
        isSuccess: false
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
        this.isSuccess = false
      },
      emailUpdate(value) {
        this.email = value
        this.$v.email.$touch()

        if ( this.$v.email.$error ) {
          this.errors.email = this.$v.email.$errors[0].$message
        } else {
          this.errors.email = ''
        }
        this.isSuccess = false
      },
      textUpdate(value) {
        this.text = value
        this.$v.text.$touch()

        if ( this.$v.text.$error ) {
          this.errors.text = this.$v.text.$errors[0].$message
        } else {
          this.errors.text = ''
        }
        this.isSuccess = false
      },
      submit() {
        this.nameUpdate(this.name)
        this.emailUpdate(this.email)
        this.textUpdate(this.text)

        if ( !this.isError ) {
          this.sendForm()
        }
      },
      async sendForm() {
        axios.post('http://localhost:5000/mail', {name: this.name, email: this.email, text: this.text })
          .then(() => {
            this.isSuccess = true
          })
          .catch(function (error) {
            console.error(error);
            this.isSuccess = false
        })
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
