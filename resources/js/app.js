require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import Example from './components/Example.vue';

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});
app
    .component('ExampleComponent', Example)

app.mount('#app');