// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import VueRouter from 'vue-router'
import http from './services/http.js'
import qs from 'qs'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

import Login from './components/Login.vue'
import Home from './components/Home.vue'
import ChangePassword from "./components/ChangePassword";
import UserMessage from "./components/UserMessage";


Vue.prototype.$http = http
Vue.prototype.$qs = qs

Vue.config.productionTip = false
Vue.use(VueRouter)
Vue.use(ElementUI)

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    {
      path: '/',
      component: Home,
      meta: {
        requireAuth: true
      }
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/change_password',
      component: ChangePassword
    },
    {
      path: '/user_message',
      component: UserMessage
    },

  ]
})

/* eslint-disable no-new */
import Auth from './services/auth.js';

router.beforeEach((to, from, next) => {
  if(to.meta.requireAuth && !Auth.authenticated())
  {
    next({
      path: '/login',
      query: { redirect: to.fullPath }
    })
  }
  else {
    next()
  }
})

new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
});

export default router
