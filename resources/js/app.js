require('./bootstrap');
import Vue from 'vue'
import About from './components/AboutComponent.vue'

const app = new Vue({
    el: '#app',
    components: {
        "about-us": About
    }
});
