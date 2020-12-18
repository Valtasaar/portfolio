<template>
  <div class="field-block">
    <label :for="id" v-if="title">{{ title }}</label>
    <textarea class="textarea"
              :id="id"
              :placeholder="placeholder"
    ></textarea>
  </div>
</template>

<script>
  export default {
    name: "Textarea",
    props: {
      title: String,
      placeholder: String
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
