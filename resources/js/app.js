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
import GoalTicketEndScreen from './components/GoalTicketEndScreen.vue';
import InactiveScreen from './components/InactiveScreen.vue';
import InstructionScreen from './components/InstructionScreen.vue';


import FinishSidebar from './components/FinishSidebar.vue';
import NotFound from './components/404.vue';

Vue.component('sideBar', SideBar);
Vue.component('goalTicket', GoalTicket);
Vue.component('goalTicketEndScreen', GoalTicketEndScreen);
Vue.component('finishSidebar', FinishSidebar);
Vue.component('goalTicketEndScreen', GoalTicketEndScreen);


const routes = [
  {
      name: 'home',
      path: '/',
      component: GeneralScreen,
  },{
      name: 'game',
      path: '/game',
      component: GameScreen
  },{
      name: 'end',
      path: '/end',
      component: SessionEndScreen,
      props: true
  },{
      name: 'error',
      path: '*',
      component: NotFound
  },{
      name: 'inactive',
      path: '/inactive',
      component: InactiveScreen
  },{
      name: 'instruction',
      path: '/instruction',
      component: InstructionScreen
    }
];

Vue.config.productionTip = false;
Vue.config.devtools = false;

export const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
