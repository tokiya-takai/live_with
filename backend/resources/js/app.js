 require('./bootstrap');

 window.Vue = require('vue').default;
 
Vue.component('hamburger-component', require('./components/HamburgerComponent.vue').default);
Vue.component('new-post-component', require('./components/NewPostComponent.vue').default);
Vue.component('edit-post-component', require('./components/EditPostComponent.vue').default);
Vue.component('list-rendering-component', require('./components/ListRenderingComponent.vue').default);
Vue.component('guest-user-component', require('./components/GuestUserComponent.vue').default);
Vue.component('user-component', require('./components/UserComponent.vue').default);
Vue.component('liked-posts-component', require('./components/LikedPostsComponent.vue').default);
Vue.component('links-component', require('./components/LinksComponent.vue').default);
Vue.component('others-links-component', require('./components/OthersLinksComponent.vue').default);
Vue.component('comments-component', require('./components/CommentsComponent.vue').default);
 
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

function showComment() {
    const commentButton = document.getElementById('comment-btn');
    const showShoe = document.getElementById('show-shoe');
    const commentArea = document.querySelector('.comment-area');

    commentButton.addEventListener('click', () => {
        if (showShoe.classList.contains('open-comment')) {
            showShoe.classList.remove('open-comment');
            showShoe.classList.add('close-comment');
        } else {
            showShoe.classList.remove('close-comment');
            showShoe.classList.add('open-comment');
        }
    });
}
window.addEventListener('load', showComment);