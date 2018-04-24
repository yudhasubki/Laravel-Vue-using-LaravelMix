import Vue from 'vue';
import VueRouter from 'vue-router';
import Example from './components/Example.vue';
import About from './components/About.vue';

const routes = new VueRouter({
    routes:[
        {
            path:'/',
            components:Example
        },
        {
            path:'/about',
            components:About,
        }
    ]
});