<template>
  <div id="comments">
    <ul class="comment-list">
      <li v-for="comment in comments">
        <div class="comment-info">
          <p class="user-name">{{ comment.name }}</p>
          <p class="created-at">{{ comment.created_at | moment }}</p>
        </div>
        <div class="comment-body"><p class="comment-content">{{ comment.content }}</p></div>
      </li>
      <div class="comment-margin"></div>
    </ul>
    <div class="post-comment-area">
      <form :action="url" method="post">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div class="textarea">
          <textarea name="content" maxlength="140" required v-mode:value="content"></textarea>
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
      url: "/comments/" + this.id,
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
    id: Number,
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