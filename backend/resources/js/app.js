/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('new-post-component', require('./components/NewPostComponent.vue').default);
 Vue.component('edit-post-component', require('./components/EditPostComponent.vue').default);
 Vue.component('list-rendering-component', require('./components/ListRenderingComponent.vue').default);
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });

function deletePost() {
    const form = document.getElementById('delete');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (window.confirm('削除された内容は元に戻せません。\n削除しますか？')) {
            document.getElementById('delete').submit();
            return;
        } else {
            return;
        }
    });
}
window.addEventListener('load', deletePost);

function prohibitScrolling() {
    const textarea = document.querySelector('textarea');
    const shoesList = document.querySelectorAll("shoes-list");

    textarea.scrollTop = 1;
    window.addEventListener('touchmove', function(event) {
        if ((event.target === textarea && textarea.scrollTop !== 0 && textarea.scrollTop + textarea.clientHeight !== textarea.scrollHeight)
            || (event.target === shoesList && shoesList.scrollTop !== 0 && shoesList.scrollTop + shoesList.clientHeight !== shoesList.scrollHeight)) {
          event.stopPropagation();
        }
        else {
          event.preventDefault();
        }
    });
    
    textarea.addEventListener('scroll', function(event) {
        if (textarea.scrollTop === 0) {
          textarea.scrollTop = 1;
        }
        else if (textarea.scrollTop + textarea.clientHeight === textarea.scrollHeight) {
          textarea.scrollTop = textarea.scrollTop - 1;
        }
    });

}
window.addEventListener('load', prohibitScrolling);
