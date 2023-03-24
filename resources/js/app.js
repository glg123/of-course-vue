require('bootstrap');
import {createApp} from 'vue'
import {createRouter, createWebHistory} from "vue-router";

const axios = require('axios').default;
window.axios = require('axios');


import App from './views/App'
import Home from './views/Home'
import Login from './views/Login'
import Register from './views/Register'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import {Swiper} from "swiper/vue";




const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },

        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },

    ],
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {

        if (localStorage.getItem('bigStore.token') == null) {
            next({
                path: '/login',
                params: {nextUrl: to.fullPath}
            })
        }
        else {
            let user = JSON.parse(localStorage.getItem('bigStore.user'))
            if (to.matched.some(record => record.meta.is_admin)) {
                if (user.is_admin == 1) {
                    next()
                } else {
                    next({name: 'userboard'})
                }
            }
            else if (to.matched.some(record => record.meta.is_user)) {

                if (user.is_admin == 0) {
                    next()
                } else {

                    if (to.matched.some(record => record.props.is_user_login == true)) {


                        if (to.matched.some(record => record.props.plan_selected == true)) {

                            next({name: 'plan_meal'})
                        }
                        next({name: 'plans'})
                    }


                }
            }
            next()
        }
    }
    else {

//requiresNotAuth
        next()
    }

})

export default router;



const app = createApp(App);


app.component('Swiper', Swiper);
app.use(VueSweetalert2);

app.use(router).mount('#app')
