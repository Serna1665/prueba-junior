

import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';

createApp(App).mount('#app');



const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');
