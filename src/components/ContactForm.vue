<template>
  <div class="form">
    <Input @update="nameUpdate"
           name="name"
           title="Name"
           placeholder="Enter your name"
           :error="errors.name"
           :disabled="isLoading"
    />

    <Input @update="emailUpdate"
           title="Email"
           type="email"
           placeholder="Enter your email"
           :error="errors.email"
           :disabled="isLoading"
    />

    <Textarea @update="textUpdate"
              title="Message"
              name="text"
              placeholder="Enter text"
              :error="errors.text"
              :disabled="isLoading"
    />

    <Button transparent
            whiteBorder
            medium
            form
            :disabled="isError || isLoading"
            @click.prevent="submit"
    >Send</Button>

    <div class="form__info form__info--error" v-if="isError">
      <span>Something went wrong! Please check all fields</span>
    </div>

    <div class="form__info form__info--error" v-if="isFailed">
      <span>{{ failedText }}</span>
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
        isSuccess: false,
        isFailed: false,
        isLoading: false,
        failedText: ''
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
        this.isFailed = false
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
        this.isFailed = false
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
        this.isFailed = false
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
        this.isLoading = true

        axios.post(`${process.env.VUE_APP_URL}/mail`, {name: this.name, email: this.email, text: this.text})
          .then(() => {
            this.isSuccess = true
            this.isFailed = false
          })
          .catch(error => {
            console.error(error);
            this.failedText = error.message
            this.isSuccess = false
            this.isFailed = true
          })
          .finally(() => {
            this.isLoading = false
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
