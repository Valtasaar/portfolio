<template>
  <div class="field-block">
    <label :for="id" v-if="title">{{ title }}</label>
    <input class="input"
           autocomplete="off"
           :id="id"
           :name="name"
           :type="type"
           :placeholder="placeholder"
           :disabled="disabled"
           @input="$emit('update', $event.target.value)"
    >
    <span class="error">{{ error }}</span>
  </div>
</template>

<script>
  export default {
    name: "Input",
    emits: ['update'],
    props: {
      type: {
        type: String,
        default: 'text'
      },
      title: String,
      placeholder: String,
      name: String,
      error: String,
      disabled: Boolean
    },
    data() {
      return {
        id: 'input-' + this.$.uid
      }
    }
  }
</script>
