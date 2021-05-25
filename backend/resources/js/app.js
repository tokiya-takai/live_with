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

function guestLogin() {
    const loginButton = document.getElementById('guest-login');
    
    loginButton.addEventListener('click', (e) => {
        e.preventDefault();
        if (window.confirm('ゲストアカウントでログインしますか？')) {
            document.getElementById('email').value = "guest@test.co.jp";
            document.getElementById('password').value = "guest123";
            document.getElementById('login').submit();
            return;
        } else {
            return;
        }
    })
}
window.addEventListener('load',guestLogin);

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

function deleteComment() {
    const forms = document.querySelectorAll('.delete-comment');

    forms.forEach(function (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (window.confirm('削除された内容は元に戻せません。\n削除しますか？')) {
                form.submit();
                return;
            } else {
                return;
            }
        });
    })
}
window.addEventListener('load', deleteComment);

function showComment() {
    const commentButton = document.getElementById('comment-btn');
    const showShoe = document.getElementById('show-shoe');
    const commentArea = document.querySelector('.comment-area');
    const commentOpenButton = document.querySelector('.comment-open-btn');

    commentButton.addEventListener('click', () => {
        if (showShoe.classList.contains('open-comment')) {
            showShoe.classList.remove('open-comment');
            showShoe.classList.add('close-comment');
            commentArea.style.height = "0px";
            commentArea.style.display = "none";
            commentOpenButton.style.transform = "rotate(0deg)";
        } else {
            showShoe.classList.remove('close-comment');
            showShoe.classList.add('open-comment');
            commentArea.style.height = "auto";
            commentArea.style.display = "block";
            commentOpenButton.style.transform = "rotate(180deg)";
        }
    });
}
window.addEventListener('load', showComment);
