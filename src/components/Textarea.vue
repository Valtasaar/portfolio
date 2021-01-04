<template>
  <div class="field-block">
    <label :for="id" v-if="title">{{ title }}</label>

    <textarea class="textarea"
              :id="id"
              :name="name"
              :placeholder="placeholder"
              @input="$emit('update', $event.target.value)"
    ></textarea>

    <span class="error">{{ error }}</span>
  </div>
</template>

<script>
  export default {
    name: "Textarea",
    emits: ['update'],
    props: {
      title: String,
      placeholder: String,
      error: String,
      name: String
    },
    data() {
      return {
        id: 'textarea-' + this.$.uid
      }
    },
    created () {
    }
  }
</script>
