import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/home',component: require('./components/home.vue') },
    { path: '/',component: App },
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app')

