<template>
  <div class="user-info">
    <form :action="toUpdateUrl" method="post" class="user-form">
      <input type="hidden" name="_token" v-bind:value="csrf">
      <div v-bind:class="{passAreaOn: isActive, passAreaOff: !isActive}">
        <p>パスワードを入力</p>
        <input type="password" class="input-password" name="password">
        <strong class="error" v-for="value in errors.password">{{ value }}</strong>
        <div class="buttons">
          <div class="cancel-btn" @click="cancelPassword()">CANCEL</div>
          <input type="submit" value="SAVE" class="submit-btn">
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
      <div class="others">
        <p class="to-password"><a :href="toPasswordUrl" v-bind:class="{events: isActive}">パスワードを変更</a></p>
        <div class="is-private">
          <div class="key-image-container">
            <transition name="privateKeyImage">
                <button v-if="isPrivate" class="private" v-bind:class="{events: isActive}" type="button" v-on:click="changeKey()"><img src="/images/private.png"></button>
            </transition>
            <transition name="publicKeyImage">
                <button v-if="!isPrivate" class="public" v-bind:class="{events: isActive}" type="button" v-on:click="changeKey()"><img src="/images/public.png"></button>
            </transition>
          </div>
          <div class="public-or-private">
              <input type="number" :value="isPrivateValue" name="isprivate" readonly="true">
              <div v-bind:class="{events: isActive}">{{ publicOrPrivate }}</div>
          </div>
        </div>
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
        toUpdateUrl: '/users/update/'+this.user.id,
        toPasswordUrl: '/password/index/'+this.user.id,
        name: "",
        email: "",
        isPrivate: Boolean,
        privateWidth: 27,
        publicWidth: 0,
        publicOrPrivate: String,
        isPrivateValue: Number,
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
      // initial value
      this.name = this.user.name;
      this.email = this.user.email;

      this.isPrivate = this.user.isprivate;
      if(this.isPrivate){
        this.publicOrPrivate = "非公開";
        this.isPrivateValue = 1;
      } else {
        this.publicOrPrivate = "公開";
        this.isPrivateValue = 0;
      }
      
      // In case of error
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
      changeKey() {
        if(this.isPrivate){
          this.publicOrPrivate = "公開";
          this.isPrivateValue = 0;
        } else {
          this.publicOrPrivate = "非公開";
          this.isPrivateValue = 1;
        }
        this.isPrivate = !this.isPrivate;
      }
    }
  }
</script>