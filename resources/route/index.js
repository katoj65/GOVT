import Vue from 'vue'
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Welcome from '../js/Pages/Welcome.vue';





const router = new VueRouter({
mode: 'history',
routes:[
{
    path:'/',
    name:'welcome',
    component:Welcome
}






    ]

});



export default router;
