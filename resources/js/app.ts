import {createApp} from 'vue'
import App from "./App.vue";
import {router} from "./router";
import { createPinia } from 'pinia'
import { createI18n } from 'vue-i18n'
import {messages} from "@/lib/I18n";

const app = createApp(App)
const html = document.querySelector('html')

if(html) {
    html.setAttribute('lang', localStorage.getItem('locale') || 'ru')
}

const i18n = createI18n({
    locale: html.getAttribute('lang') , // set locale
    fallbackLocale: 'en', // set fallback locale
    messages, // set locale messages
    legacy: false
    // If you need to specify other options, you can set other options
    // ...
})
app.use(router).use(i18n).use(createPinia()).mount('#app')
