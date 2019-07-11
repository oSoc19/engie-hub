require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import ExampleComponent from './components/ExampleComponent.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: ExampleComponent
  },{
      name: 'welcome',
      path: '/welcome',
      component: ExampleComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
