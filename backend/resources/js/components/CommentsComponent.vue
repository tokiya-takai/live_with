<template>
  <div id="comments">
    <ul class="comment-list">
      <li v-for="comment in comments">
        <p>{{ comment.content }}</p>
      </li>
    </ul>
    <div class="post-comment-area">
      <form :action="url" method="post">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div><textarea name="content" maxlength="140" required></textarea></div>
        <!-- <strong class="error" v-for="value in errors.content">{{ value }}</strong> -->
        <div><button><input type="submit" value="SEND"></button></div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "/comments/" + this.id,
    }
  },
  props: {
    csrf: {
      type: String,
      required: true,
    },
    id: Number,
    comments: Array,
  }
}
</script>