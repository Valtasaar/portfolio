import { createApp } from 'vue'
import App from './App.vue'
import './assets/styles/index.less'
import { VuelidatePlugin } from '@vuelidate/core'

const app = createApp(App)

app.config.unwrapInjectedRef = true
app.use(VuelidatePlugin).mount('#app')
