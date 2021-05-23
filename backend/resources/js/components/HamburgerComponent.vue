<template>
  <div class="hamburger">
    <!-- Hamburger menu button -->
      <div class="hamburger-btn" v-on:click='ActiveBtn=!ActiveBtn'>
        <span class="line line1" v-bind:class="{'btn-line1':ActiveBtn}"></span>
        <span class="line line2" v-bind:class="{'btn-line2':ActiveBtn}"></span>
        <span class="line line3" v-bind:class="{'btn-line3':ActiveBtn}"></span>
      </div>
      <!--Side bar-->
      <transition name="menu">
        <div class="menu" v-show="ActiveBtn">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a :href="toMyPageUrl">MY PAGE</a></li>
                <li><a :href="toMyLikesUrl">MY LIKES</a></li>
                <li><a href="/social/index">SOCIAL</a></li>
                <li><a href="/posts/new">NEW POST</a></li>
            </ul>
        </div>
    </transition>
  </div>
</template>

<script>
export default {
  data() {
    return {
      ActiveBtn: false,
      toMyPageUrl: String,
      toMyLikesUrl: String,
    }
  },
  props: {
    user: Number,
  },
  mounted() {
    if(this.user < 0){
      this.toMyPageUrl = "/";
      this.toMyLikesUrl = "/";
    } else {
      this.toMyPageUrl = "/users/"+this.user;
      this.toMyLikesUrl = "/users/"+this.user+"/show";
    }
  },
}
</script>