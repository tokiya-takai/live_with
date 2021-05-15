<template>
  <div class="user-info">
    <form :action="url" method="post" class="user-form">
      <input type="hidden" name="_token" v-bind:value="csrf">
      <div v-bind:class="{passAreaOn: isActive, passAreaOff: !isActive}">
        <p>パスワードを入力</p>
        <input type="password" class="input-password" name="password">
        <strong class="error" v-for="value in errors.password">{{ value }}</strong>
        <div class="buttons">
          <div class="cancel-btn" @click="cancelPassword()">CANCEL</div>
          <input type="submit" value="SAVE" class="submit-btn">
          <!-- <div class="submit-btn" @click="sendNewUserData()">SAVE</div> -->
        </div>
      </div>
      <strong class="success" v-for="value in errors.success">{{ value }}</strong>
      <div class="user-form-group name" v-bind:class="{events: isActive}">
        <label>ユーザー名</label>
        <input type="text" name="name" v-model="name" v-bind:class="{events: isActive}">
        <strong class="error" v-for="value in errors.name">{{ value }}</strong>
      </div>
      <div class="user-form-group email" v-bind:class="{events: isActive}">
        <label>メールアドレス</label>
        <input type="email" name="email" v-model="email" v-bind:class="{events: isActive}">
        <strong class="error" v-for="value in errors.email">{{ value }}</strong>
      </div>
      <div class="user-form-group send-btn" v-bind:class="{events: isActive}">
        <div class="dummy-send-button" @click="inputPassword()" v-bind:class="{events: isActive}">SAVE</div>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        isActive: false,
        url: '/users/update/'+this.user.id,
        name: "",
        email: "",
      }
    },
    props: {
      csrf: {
        type: String,
        required: true,
      },
      user: Object,
      old: Array,
      errors: Array,
    },
    mounted() {
      this.name = this.user.name;
      this.email = this.user.email;

      if(this.old.name){
        this.name = this.old.name;
      }
      if(this.old.email){
        this.email = this.old.email;
      }

      if(this.errors.password){
        this.isActive = true;
      }
    },
    methods: {
      inputPassword() {
        if(this.isActive){
          this.isActive = false
        } else {
          this.isActive = true;
        }
        this.errors.success = "";
      },
      cancelPassword() {
        if(this.isActive){
          this.isActive = false
        } else {
          this.isActive = true;
        }
        this.errors.password = "";
      },
    }
  }
</script>