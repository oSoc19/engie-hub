require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import ExampleComponent from './components/ExampleComponent.vue';
import SideBar from './components/SideBar.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: ExampleComponent
  },{
      name: 'sidebar',
      path: '/welcome',
      component: SideBar
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
