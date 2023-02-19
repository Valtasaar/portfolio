<script setup>
import dictionary from '../data/dictionary.json'
import axios from 'axios'
import { computed, inject, reactive } from 'vue'
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
  isLoading: false
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
const { lang } = inject('lang')
const failedText = computed(() => lang.value === 'en' ? dictionary.form.failed.en : dictionary.form.failed.ru)
const namePlaceholder = computed(() => lang.value === 'en' ? dictionary.form.name.en : dictionary.form.name.ru)
const emailPlaceholder = computed(() => lang.value === 'en' ? dictionary.form.email.en : dictionary.form.email.ru)
const textPlaceholder = computed(() => lang.value === 'en' ? dictionary.form.text.en : dictionary.form.text.ru)
const errorText = computed(() => lang.value === 'en' ? dictionary.form.error.en : dictionary.form.error.ru)
const successText = computed(() => lang.value === 'en' ? dictionary.form.success.en : dictionary.form.success.ru)
const sendText = computed(() => lang.value === 'en' ? 'Send' : 'Отправить')
const sendLoadingText = computed(() => lang.value === 'en' ? 'Sending...' : 'Отправка...')
const requiredMsg = computed(() => lang.value === 'en' ? 'Value is required' : 'Поле обязательно для заполнению')
const emailMsg = computed(() => lang.value === 'en' ? 'Value is not a valid email address' : 'Значение не является email адресом')
const nameError = computed(() => (v$.name.$dirty && v$.name.required.$invalid) ? requiredMsg.value : '' )
const textError = computed(() => (v$.text.$dirty && v$.text.required.$invalid) ? requiredMsg.value : '' )
const emailError = computed(() => {
  if ( v$.email.$dirty )
    return v$.email.required.$invalid ? requiredMsg.value : v$.email.email.$invalid ? emailMsg.value : ''
  else
    return ''
})

function fieldUpdate(name, value) {
  fields.form[name] = value
  v$[name].$touch()

  if ( v$[name].$error ) {
    data.errors[name] = v$[name].$errors[0].$message
  } else {
    data.errors[name] = ''
  }

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
           :title="lang === 'en' ? 'Name' : 'Имя'"
           :placeholder="namePlaceholder"
           :error="nameError"
           :disabled="data.isLoading"
    />

    <Input @update="(value) => fieldUpdate('email', value)"
           title="Email"
           type="email"
           :placeholder="emailPlaceholder"
           :error="emailError"
           :disabled="data.isLoading"
    />

    <Textarea @update="(value) => fieldUpdate('text', value)"
              :title="lang === 'en' ? 'Message' : 'Текст'"
              name="text"
              :placeholder="textPlaceholder"
              :error="textError"
              :disabled="data.isLoading"
    />

    <Button transparent
            whiteBorder
            medium
            form
            :disabled="isError || data.isLoading"
            @click.prevent="submit"
    >
      {{ data.isLoading ? sendLoadingText : sendText }}
    </Button>

    <div class="form__info form__info--error" v-if="isError">
      <span>{{ errorText }}</span>
    </div>

    <div class="form__info form__info--error" v-if="data.isFailed">
      <span>{{ failedText }}</span>
    </div>

    <div class="form__info form__info--success" v-if="data.isSuccess">
      <span>{{ successText }}</span>
    </div>
  </div>
</template>
