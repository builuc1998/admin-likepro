import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/user',component: require('./components/user.vue') },
    { path: '/user/:id',component: require('./components/profile.vue') },
    { path: '/history',component: require('./components/history.vue') },
    { path: '/viewtask',component: require('./components/viewtask.vue') },
    { path: '/transaction',component: require('./components/transaction.vue') }
    
]
const router = new VueRouter({
    routes
})
new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App }
}).$mount('#hihi')



