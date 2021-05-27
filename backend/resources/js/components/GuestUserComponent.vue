<template>
  <div class="user-info">
    <p style="width:100%; text-align:center; margin-top: 10px;">ゲストユーザーは変更ができません。</p>
    <form :action="url" method="post" class="user-form">
      <div class="user-form-group name">
        <label>ユーザー名</label>
        <input type="text" name="name" v-model="name" readonly="true">
      </div>
      <div class="user-form-group email">
        <label>メールアドレス</label>
        <input type="email" name="email" v-model="email" readonly="true">
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        url: '/',
        name: "",
        email: "",
      }
    },
    props: {
      user: Object,
    },
    mounted() {
      this.name = this.user.name;
      this.email = this.user.email;
    },
  }
</script>