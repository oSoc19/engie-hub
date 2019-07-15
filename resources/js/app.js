require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import GeneralScreen from './components/GeneralScreen.vue';
import SideBar from './components/SideBar.vue';

Vue.component('sideBar', SideBar);

const routes = [
  {
      name: 'home',
      path: '/',
      component: GeneralScreen
  },{
      name: 'side',
      path: '/sidebar',
      component: SideBar

  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
