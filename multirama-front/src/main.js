// === DEFAULT / CUSTOM STYLE ===
// WARNING! always comment out ONE of the two require() calls below.
// 1. use next line to activate CUSTOM STYLE (./src/themes)
// require(`./themes/app.${__THEME}.styl`)
// 2. or, use next line to activate DEFAULT QUASAR STYLE

require(`quasar/dist/quasar.${__THEME}.css`)
// ==============================
import 'quasar-extras/material-icons'
import 'quasar-extras/ionicons'
import 'quasar-extras/fontawesome'
import 'quasar-extras/animate'
import './services/imports'

// Uncomment the following lines if you need IE11/Edge support
// require(`quasar/dist/quasar.ie`)
// require(`quasar/dist/quasar.ie.${__THEME}.css`)

import Vue from 'vue'
import Quasar from 'quasar'
import router from './router'
import Vuex from 'vuex'
import VuexStore from './vuex/store'
import VueResource from 'vue-resource'
import Auth from './packages/auth/Auth'

Vue.config.productionTip = false
Vue.use(Quasar) // Install Quasar Framework
Vue.use(Vuex)
Vue.use(VueResource)
Vue.use(VuexStore)
Vue.use(Auth)
Vue.http.options.root = process.env.SERVER
Vue.http.options.emulateJSON = true

const store = new Vuex.Store(VuexStore)

if (__THEME === 'mat') {
  require('quasar-extras/roboto-font')
}

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.forAny)) {
    if (Vue.auth.isAuthenticated()) {
      next({
        path: '/home'
      })
    }
    next()
  }
  else if (to.matched.some(record => record.meta.forAuth)) {
    if (!Vue.auth.isAuthenticated()) {
      next({
        path: '/'
      })
    }
    else {
      next()
    }
  }
  else {
    next()
  }
})
Quasar.start(() => {
  /* eslint-disable no-new */
  new Vue({
    el: '#q-app',
    router,
    store,
    render: h => h(require('./App').default)
  })
})
