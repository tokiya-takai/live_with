<template>
  <div class="user-info">
    <form action="" method="post">
      <div class="password-area">
        <p>パスワードを入力</p>
        <input type="password">
      </div>
      <div class="user-form-group">
        <label>ユーザー名</label>
        <input type="text" name="name" :value="user.name">
      </div>
      <div class="user-form-group">
        <label>メールアドレス</label>
        <input type="email" name="email" :value="user.email">
      </div>
      <div class="user-form-group">
        <div class="dummy-send-button" @click="inputPassword()">SEND</div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    props: {
      csrf: {
        type: String,
        required: true,
      },
      user: Object,
    },
    methods: {
      inputPassword() {
        console.log('inputPassword');
      }
    }
  }
</script>