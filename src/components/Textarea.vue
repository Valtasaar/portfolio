<template>
  <div class="field-block">
    <label :for="id" v-if="title">{{ title }}</label>

    <textarea class="textarea"
              :id="id"
              :name="name"
              :placeholder="placeholder"
              :disabled="disabled"
              @input="$emit('update', $event.target.value)"
    />

    <span class="error">{{ error }}</span>
  </div>
</template>

<script>
export default {
  name: 'Textarea',
  props: {
    title: String,
    placeholder: String,
    error: String,
    name: String,
    disabled: Boolean
  },
  emits: ['update'],
  data() {
    return {
      id: 'textarea-' + this.$.uid
    }
  }
}
</script>
