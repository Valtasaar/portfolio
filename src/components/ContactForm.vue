<script setup>
import axios from 'axios'
import { computed, nextTick, reactive } from 'vue'
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
  form: {
    name: '',
    email: '',
    text: ''
  }
})
const isError = computed(() => v$ ? ( v$.$invalid && v$.$dirty ) : false)
const rules = {
  form: {
    name: { required },
    email: { required, email },
    text: { required }
  }
}
const v$ = useVuelidate(rules, fields).value.form

function fieldUpdate(name, value) {
  fields.form[name] = value
  v$[name].$touch()

  if ( v$[name].$error )
    data.errors[name] = v$[name].$errors[0].$message
  else
    data.errors[name] = ''

  data.isSuccess = false
  data.isFailed = false
}

async function submit() {
  Object.keys(fields.form).forEach((key) => {
    fieldUpdate(key, fields.form[key])
  })

  if ( !isError.value ) {
    sendForm()
  }
}

async function sendForm() {
  data.isLoading = true

  axios.post(
      `${process.env.VUE_APP_API_URL}/send-mail`,
      { name: fields.form.name, email: fields.form.email, text: fields.form.text }
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
    <Input @update="(value) => fieldUpdate('name', value)"
           name="name"
           title="Name"
           placeholder="Enter your name"
           :error="data.errors.name"
           :disabled="data.isLoading"
    />

    <Input @update="(value) => fieldUpdate('email', value)"
           title="Email"
           type="email"
           placeholder="Enter your email"
           :error="data.errors.email"
           :disabled="data.isLoading"
    />

    <Textarea @update="(value) => fieldUpdate('text', value)"
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
