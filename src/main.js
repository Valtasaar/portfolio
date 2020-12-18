import { createApp } from 'vue'
import App from './App.vue'
import './assets/styles/index.less'
import { VuelidatePlugin } from '@vuelidate/core'

createApp(App).use(VuelidatePlugin).mount('#app')
