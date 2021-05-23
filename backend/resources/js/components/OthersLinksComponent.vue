<template>
  <div class="others-links">
    <div class="others-links-area">
      <div class="link-group">
        <img v-if="urlImage01 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay01">
        <img v-else :src="urlImage01">
        <a v-if="link01 != ''" :href="link01">{{ link01 }}</a>
      </div>
      <div class="link-group">
        <img v-if="urlImage02 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay02">
        <img v-else :src="urlImage02">
        <a v-if="link02 != ''" :href="link02">{{ link02 }}</a>
      </div>
      <div class="link-group">
        <img v-if="urlImage03 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay03">
        <img v-else :src="urlImage03">
        <a v-if="link03 != ''" :href="link03">{{ link03 }}</a>
      </div>
      <div class="link-group">
        <img v-if="urlImage04 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay04">
        <img v-else :src="urlImage04">
        <a v-if="link04 != ''" :href="link04">{{ link04 }}</a>
      </div>
      <div class="link-group">
        <img v-if="urlImage05 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay05">
        <img v-else :src="urlImage05">
        <a v-if="link05 != ''" :href="link05">{{ link05 }}</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      link01: "",
      link02: "",
      link03: "",
      link04: "",
      link05: "",
      imageDisplay01: "none;",
      imageDisplay02: "none;",
      imageDisplay03: "none;",
      imageDisplay04: "none;",
      imageDisplay05: "none;",
      urlImage01: "",
      urlImage02: "",
      urlImage03: "",
      urlImage04: "",
      urlImage05: "",
      instagram: "https://www.instagram.com",
      twitter: "https://twitter.com",
      facebook: "https://www.facebook.com",
    }
  },
  props: {
    links: Object,    
  },
  mounted() {
    this.link01 = this.links.link1;
    if(this.links.link1 != ""){
      this.inputWidth01 = 160;
      this.setImage01();
    }

    this.link02 = this.links.link2;
    if(this.links.link2 != ""){
      this.inputWidth02 = 160;
      this.setImage02();
    }

    this.link03 = this.links.link3;
    if(this.links.link3 != ""){
      this.inputWidth03 = 160;
      this.setImage03();
    }

    this.link04 = this.links.link4;
    if(this.links.link4 != ""){
      this.inputWidth04 = 160;
      this.setImage04();
    }

    this.link05 = this.links.link5;
    if(this.links.link5 != ""){
      this.inputWidth05 = 160;
      this.setImage05();
    }
  },
  methods: {
    setImage01 () {
      this.urlImage01 = "";
      if(this.link01.indexOf(this.instagram) === 0){
        this.urlImage01 = "/images/instagram.png";
        return;
      }
      if(this.link01.indexOf(this.twitter) === 0){
        this.urlImage01 = "/images/twitter.png";
        return;
      }
      if(this.link01.indexOf(this.facebook) === 0){
        this.urlImage01 = "/images/facebook.png";
        return;
      } else {
        this.urlImage01 = "/images/not-sns.png";
      }
    },
    setImage02 () {
      this.urlImage02 = "";
      if(this.link02.indexOf(this.instagram) === 0){
        this.urlImage02 = "/images/instagram.png";
        return;
      }
      if(this.link02.indexOf(this.twitter) === 0){
        this.urlImage02 = "/images/twitter.png";
        return;
      }
      if(this.link02.indexOf(this.facebook) === 0){
        this.urlImage02 = "/images/facebook.png";
        return;
      } else {
        this.urlImage02 = "/images/not-sns.png";
      }
    },
    setImage03 () {
      this.urlImage03 = "";
      if(this.link03.indexOf(this.instagram) === 0){
        this.urlImage03 = "/images/instagram.png";
        return;
      }
      if(this.link03.indexOf(this.twitter) === 0){
        this.urlImage03 = "/images/twitter.png";
        return;
      }
      if(this.link03.indexOf(this.facebook) === 0){
        this.urlImage03 = "/images/facebook.png";
        return;
      } else {
        this.urlImage03 = "/images/not-sns.png";
      }
    },
    setImage04 () {
      this.urlImage04 = "";
      if(this.link04.indexOf(this.instagram) === 0){
        this.urlImage04 = "/images/instagram.png";
        return;
      }
      if(this.link04.indexOf(this.twitter) === 0){
        this.urlImage04 = "/images/twitter.png";
        return;
      }
      if(this.link04.indexOf(this.facebook) === 0){
        this.urlImage04 = "/images/facebook.png";
        return;
      } else {
        this.urlImage04 = "/images/not-sns.png";
      }
    },
    setImage05 () {
      this.urlImage05 = "";
      if(this.link05.indexOf(this.instagram) === 0){
        this.urlImage05 = "/images/instagram.png";
        return;
      }
      if(this.link05.indexOf(this.twitter) === 0){
        this.urlImage05 = "/images/twitter.png";
        return;
      }
      if(this.link05.indexOf(this.facebook) === 0){
        this.urlImage05 = "/images/facebook.png";
        return;
      } else {
        this.urlImage05 = "/images/not-sns.png";
      }
    },
  }
}
</script>