<script setup>
import * as Vue from 'vue'
import { reactive } from 'vue'

const props = defineProps({
  type: {
    type: String,
    default: 'text'
  },
  title: String,
  placeholder: String,
  name: String,
  error: String,
  disabled: Boolean
})
const data = reactive({
  id: 'input-' + Vue.getCurrentInstance().uid
})

defineEmits(['update'])
</script>

<template>
  <div class="field-block">
    <label :for="data.id" v-if="props.title">{{ props.title }}</label>
    <input class="input"
           autocomplete="off"
           :id="data.id"
           :name="props.name"
           :type="props.type"
           :placeholder="props.placeholder"
           :disabled="props.disabled"
           @input="$emit('update', $event.target.value)"
    >
    <span class="error">{{ props.error }}</span>
  </div>
</template>
