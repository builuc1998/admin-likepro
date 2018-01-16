import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/',component: require('./components/home.vue') },
    { path: '/_=_',component: require('./components/home.vue') },
    { path: '/user',component: require('./components/user.vue') },
    { path: '/viplike',component: require('./components/viplike.vue') },
    { path: '/vipcomment',component: require('./components/vipcomment.vue') },
    { path: '/vipshare',component: require('./components/vipshare.vue') },
    { path: '/review',component: require('./components/review.vue') },
    { path: '/profile',component: require('./components/profile.vue') },
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



