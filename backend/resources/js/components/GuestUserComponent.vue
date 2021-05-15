<template>
  <div class="user-info">
    <form action="" method="post" class="user-form">
      <div class="user-form-group">
        <label>ユーザー名</label>
        <input type="text" name="name" :value="user.name">
      </div>
      <div class="user-form-group">
        <label>メールアドレス</label>
        <input type="email" name="email" :value="user.email">
      </div>
      <div class="user-form-group">
        <div class="dummy-send-button">SAVE</div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    props: {
      user: Object,
    },
  }
</script>