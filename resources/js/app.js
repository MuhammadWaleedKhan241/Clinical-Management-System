import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



    // import { createApp } from 'vue';

    // import ExampleComponent from './components/ExampleComponent.vue';

    // const app = createApp({});

    // app.component('example-component', ExampleComponent);

    // app.mount('#app');


require('./bootstrap');
import { createApp } from 'vue';
import ServiceBillForm from './components/ServiceBillForm.vue';

const app = createApp({});
app.component('service-bill-form', ServiceBillForm);
app.mount('#app');
