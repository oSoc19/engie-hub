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
import GameScreen from './components/GameScreen.vue';
import SessionEndScreen from './components/SessionEndScreen.vue';
import GoalTicket from './components/GoalTicket.vue';
import FinishSidebar from './components/FinishSidebar.vue';


Vue.component('sideBar', SideBar);
Vue.component('GoalTicket', GoalTicket;
Vue.component('FinishSidebar', FinishSidebar;



const routes = [
  {
      name: 'home',
      path: '/',
      component: GeneralScreen
  },{
      name: 'game',
      path: '/game',
      component: GameScreen
  },{
      name: 'end',
      path: '/end',
      component: SessionEndScreen
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
