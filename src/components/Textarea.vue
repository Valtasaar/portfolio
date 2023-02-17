<script setup>
import * as Vue from 'vue'
import { reactive } from 'vue'

defineProps({
  title: String,
  placeholder: String,
  error: String,
  name: String,
  disabled: Boolean
})
defineEmits(['update'])

const data = reactive({
  id: 'textarea-' + Vue.getCurrentInstance().uid
})
</script>

<template>
  <div class="field-block">
    <label :for="data.id" v-if="title">{{ title }}</label>

    <textarea class="textarea"
              :id="data.id"
              :name="name"
              :placeholder="placeholder"
              :disabled="disabled"
              @input="$emit('update', $event.target.value)"
    />

    <span class="error">{{ error }}</span>
  </div>
</template>
