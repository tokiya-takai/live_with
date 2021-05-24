<template>
  <div id="comments">
    <ul class="comment-list">
      <li v-for="comment in comments">
        <div class="comment-info">
          <p class="user-name">{{ comment.name }}</p>
          <p class="created-at">{{ comment.created_at | moment }}</p>
          <div v-if="comment.user_id == my_id" class="comment-delete">
            <form :action="deleteCommentUrl + comment.id" method="post" class="delete-comment">
              <input type="hidden" name="_token" v-bind:value="csrf">
              <button><img src="/images/dust-box.png"><input type="submit" class="my-comment-delete-submit"></button>
            </form>
          </div>
        </div>
        <div class="comment-body"><p class="comment-content">{{ comment.content }}</p></div>
      </li>
      <div class="comment-margin"></div>
    </ul>
    <div class="post-comment-area">
      <form :action="postCommentUrl" method="post">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div class="textarea">
          <textarea name="content" maxlength="140" required v-model:value="content"></textarea>
          <p>{{ content.length }}/140</p>
        </div>
        <strong class="error" v-for="value in errors.content">{{ value }}</strong>
        <div class="submit-btn"><button><input type="submit" value="SEND"></button></div>
      </form>
    </div>
  </div>
</template>

<script>
import moment from 'moment';
export default {
  data() {
    return {
      postCommentUrl: "/comments/" + this.post_id,
      deleteCommentUrl: "/comments/delete/",
      content: null,
    }
  },
  mounted() {
    if(this.old.content){
        this.content = this.old.content;
    } else {
        this.content = "";
    }
  },
  props: {
    csrf: {
      type: String,
      required: true,
    },
    post_id: Number,
    my_id: Number,
    comments: Array,
    old: Array,
    errors: Array,
  },
  filters: {
    moment: function (date) {
      return moment(date).format('YYYY/MM/DD HH:mm');
    },
  }
}
</script>