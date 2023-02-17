<script setup>
import axios from 'axios'
import { computed, reactive } from 'vue'
import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'
import Input from '@/components/Input'
import Textarea from '@/components/Textarea'
import Button from '@/components/Button'

const data = reactive({
  errors: {
    name: '',
    email: '',
    text: ''
  },
  isSuccess: false,
  isFailed: false,
  isLoading: false,
  failedText: 'Something went wrong. Please, try later.'
})
const fields = reactive({
  name: 'asd',
  email: '',
  text: ''
})
const isError = computed(() => v$ ? ( v$.$invalid && v$.$dirty ) : false)
const rules = {
  form: {
    name: { required },
    text: { required },
    email: { required, email }
  }
}
const v$ = useVuelidate(rules, fields).value.form

function nameUpdate(value) {
  console.log(value)
  fields.name = value
  v$.name.$touch()

  if ( v$.name.$error ) {
    data.errors.name = v$.name.$errors[0].$message
  } else {
    data.errors.name = ''
  }

  data.isSuccess = false
  data.isFailed = false
}

function emailUpdate(value) {
  fields.email = value
  v$.email.$touch()

  if ( v$.email.$error ) {
    data.errors.email = v$.email.$errors[0].$message
  } else {
    data.errors.email = ''
  }

  data.isSuccess = false
  data.isFailed = false
}

function textUpdate(value) {
  fields.text = value
  v$.text.$touch()

  if ( v$.text.$error ) {
    data.errors.text = v$.text.$errors[0].$message
  } else {
    data.errors.text = ''
  }

  data.isSuccess = false
  data.isFailed = false
}

function submit() {
  /* nameUpdate(data.name)
  emailUpdate(data.email)
  textUpdate(data.text) */
  v$.$touch()
  v$.$validate()
  console.log(v$.$dirty)

  /* if ( !isError.value && v$.$dirty ) {
    sendForm()
  } */
}

async function sendForm() {
  data.isLoading = true

  axios.post(
      `${process.env.VUE_APP_API_URL}/send-mail`,
      { name: data.name, email: data.email, text: data.text }
  )
  .then((res) => {
    if ( res.data.status ) {
      data.isSuccess = true
      data.isFailed = false
    } else {
      data.isSuccess = false
      data.isFailed = true
      console.error(res.data.error)
    }
  })
  .catch(error => {
    console.error(error)
    data.isSuccess = false
    data.isFailed = true
  })
  .finally(() => {
    data.isLoading = false
  })
}
</script>

<template>
  <div class="form">
    <Input @update="nameUpdate"
           name="name"
           title="Name"
           placeholder="Enter your name"
           :error="data.errors.name"
           :disabled="data.isLoading"
    />

    <Input @update="emailUpdate"
           title="Email"
           type="email"
           placeholder="Enter your email"
           :error="data.errors.email"
           :disabled="data.isLoading"
    />

    <Textarea @update="textUpdate"
              title="Message"
              name="text"
              placeholder="Enter text"
              :error="data.errors.text"
              :disabled="data.isLoading"
    />

    <Button transparent
            whiteBorder
            medium
            form
            :disabled="isError || data.isLoading"
            @click.prevent="submit"
    >
      {{ data.isLoading ? 'Sending...' : 'Send' }}
    </Button>

    <div class="form__info form__info--error" v-if="isError">
      <span>Something went wrong! Please check all fields</span>
    </div>

    <div class="form__info form__info--error" v-if="data.isFailed">
      <span>{{ data.failedText }}</span>
    </div>

    <div class="form__info form__info--success" v-if="data.isSuccess">
      <span>Your message has been sent!</span>
    </div>
  </div>
</template>
