<template>
  <div class="form">
    <Input @update="nameUpdate" name="name" title="Name" placeholder="Enter your name"/>
    <Input @update="emailUpdate" title="Email" type="email" placeholder="Enter your email"/>
    <Textarea title="Message" placeholder="Enter text"/>
    <Button transparent whiteBorder medium form>Send</Button>
  </div>
</template>

<script>
  import Input from '@/components/Input'
  import Textarea from '@/components/Textarea'
  import Button from '@/components/Button'
  import { required, email } from '@vuelidate/validators'

  export default {
    name: "ContactForm",
    components: {Input, Textarea, Button},
    data() {
      return {
        name: '',
        email: ''
      }
    },
    methods: {
      nameUpdate(value) {
        this.name = value
        this.$v.name.$touch()
        console.log(this.$v.name.$error);
      },
      emailUpdate(value) {
        this.email = value
        this.$v.email.$touch()
        console.log(this.$v.email.$error);
      }
    },
    validations () {
      return {
        name: {required},
        email: {required, email}
      }
    }
  }
</script>
