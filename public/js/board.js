
// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * includes Vue and other libraries. It is a great starting point when
//  * building robust, powerful web applications using Vue and Laravel.
//  */


// window.Vue = require('vue');

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

var token = document.querySelector('input[name="_token"]').value;

const go = function() {
    
    var params = {
        headers:{
            "content-type":"application/json;charset=UTF-8",
            'X-CSRF-TOKEN' : token
        },
        method:"POST"
    }
    return fetch("/board", params)
        .then((data) => {
            console.log('dez');
        })
}