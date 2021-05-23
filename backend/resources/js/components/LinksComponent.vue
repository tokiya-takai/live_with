<template>
  <div class="links" :style="'height:' + areaHeight + 'px;'">
    <button class="links-area-btn" v-bind:class="{active: isActive}" @click="openLinksArea()">
      <img v-if="!isActive" src="/images/link.png">
      <img v-else src="/images/close.png">
    </button>
    <div class="links-area" :style="'opacity:'+opacity+';'">
      <form :action="url" method="post">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <p>Add URL</p>
        <div class="link-group">
          <div v-if="! isAdded01 && link01 == ''" class="add-link-btn"><button @click="showInput(1)"><img src="/images/add-link.png"></button></div>
          <div class="input-link">
            <img v-if="urlImage01 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay01">
            <img v-else :src="urlImage01" :style="'display:'+imageDisplay01">
            <input type="url" name="link1" v-model="link01" @input="setImage01()" v-on:blur="isEmpty(1)" class="input" :style="'width:' + inputWidth01 + 'px;'">
          </div>
        </div>
        <div class="link-group">
          <div v-if="! isAdded02 && link02 == ''" class="add-link-btn"><button @click="showInput(2)"><img src="/images/add-link.png"></button></div>
          <div class="input-link">
            <img v-if="urlImage02 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay02">
            <img v-else :src="urlImage02" :style="'display:'+imageDisplay02">
            <input type="url" name="link2" v-model="link02" @input="setImage02()" v-on:blur="isEmpty(2)" class="input" :style="'width:' + inputWidth02 + 'px;'">
          </div>
        </div>
        <div class="link-group">
          <div v-if="! isAdded03 && link03 == ''" class="add-link-btn"><button @click="showInput(3)"><img src="/images/add-link.png"></button></div>
          <div class="input-link">
            <img v-if="urlImage03 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay03">
            <img v-else :src="urlImage03" :style="'display:'+imageDisplay03">
            <input type="url" name="link3" v-model="link03" @input="setImage03()" v-on:blur="isEmpty(3)" class="input" :style="'width:' + inputWidth03 + 'px;'">
          </div>
        </div>
        <div class="link-group">
          <div v-if="! isAdded04 && link04 == ''" class="add-link-btn"><button @click="showInput(4)"><img src="/images/add-link.png"></button></div>
          <div class="input-link">
            <img v-if="urlImage04 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay04">
            <img v-else :src="urlImage04" :style="'display:'+imageDisplay04">
            <input type="url" name="link4" v-model="link04" @input="setImage04()" v-on:blur="isEmpty(4)" class="input" :style="'width:' + inputWidth04 + 'px;'">
          </div>
        </div>
        <div class="link-group">
          <div v-if="! isAdded05 && link05 == ''" class="add-link-btn"><button @click="showInput(5)"><img src="/images/add-link.png"></button></div>
          <div class="input-link">
            <img v-if="urlImage05 == ''" src="/images/not-sns.png" :style="'display:'+imageDisplay05">
            <img v-else :src="urlImage05" :style="'display:'+imageDisplay05">
            <input type="url" name="link5" v-model="link05" @input="setImage05()" v-on:blur="isEmpty(5)" class="input" :style="'width:' + inputWidth05 + 'px;'">
          </div>
        </div>
        <input type="submit" value="Register">
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "/links/" + this.id,
      areaHeight: 30,
      inputWidth01: 0,
      inputWidth02: 0,
      inputWidth03: 0,
      inputWidth04: 0,
      inputWidth05: 0,
      isActive: false,
      opacity: 0,
      link01: "",
      link02: "",
      link03: "",
      link04: "",
      link05: "",
      isAdded01: false,
      isAdded02: false,
      isAdded03: false,
      isAdded04: false,
      isAdded05: false,
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
    csrf: {
      type: String,
      required: true,
    },
    links: Object,
    id: Number,
    
  },
  mounted() {
    this.link01 = this.links.link1;
    if(this.links.link1 != ""){
      this.isAdded01 = true;
      this.inputWidth01 = 300;
      this.setImage01();
    }

    this.link02 = this.links.link2;
    if(this.links.link2 != ""){
      this.isAdded02 = true;
      this.inputWidth02 = 300;
      this.setImage02();
    }

    this.link03 = this.links.link3;
    if(this.links.link3 != ""){
      this.isAdded03 = true;
      this.inputWidth03 = 300;
      this.setImage03();
    }

    this.link04 = this.links.link4;
    if(this.links.link4 != ""){
      this.isAdded04 = true;
      this.inputWidth04 = 300;
      this.setImage04();
    }

    this.link05 = this.links.link5;
    if(this.links.link5 != ""){
      this.isAdded05 = true;
      this.inputWidth05 = 300;
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
    openLinksArea() {
      if(this.isActive){
        this.areaHeight = 30;
        this.opacity = 0;
      } else {
        this.areaHeight = 250;
        this.opacity = 1;
      }
      this.isActive = ! this.isActive;
    },
    showInput(key) {
      switch (key) {
        case 1:
          this.isAdded01 = true;
          this.inputWidth01 = 300;
          this.imageDisplay01 = "inline;"
          if(this.link02 == ""){
            this.isAdded02 = false;
            this.inputWidth02 = 0;
            this.imageDisplay02 = "none;";
          }
          if(this.link03 == ""){
            this.isAdded03 = false;
            this.inputWidth03 = 0;
            this.imageDisplay03 = "none;";
          }
          if(this.link04 == ""){
            this.isAdded04 = false;
            this.inputWidth04 = 0;
            this.imageDisplay04 = "none;";
          }
          if(this.link05 == ""){
            this.isAdded05 = false;
            this.inputWidth05 = 0;
            this.imageDisplay05 = "none;";
          }
          break;
        case 2:
          this.isAdded02 = true;
          this.inputWidth02 = 300;
          this.imageDisplay02 = "inline;"
          if(this.link01 == ""){
            this.isAdded01 = false;
            this.inputWidth01 = 0;
            this.imageDisplay01 = "none;";
          }
          if(this.link03 == ""){
            this.isAdded03 = false;
            this.inputWidth03 = 0;
            this.imageDisplay03 = "none;";
          }
          if(this.link04 == ""){
            this.isAdded04 = false;
            this.inputWidth04 = 0;
            this.imageDisplay04 = "none;";
          }
          if(this.link05 == ""){
            this.isAdded05 = false;
            this.inputWidth05 = 0;
            this.imageDisplay05 = "none;";
          }
          break;
        case 3:
          this.isAdded03 = true;
          this.inputWidth03 = 300;
          this.imageDisplay03 = "inline;"
          if(this.link01 == ""){
            this.isAdded01 = false;
            this.inputWidth01 = 0;
            this.imageDisplay01 = "none;";
          }
          if(this.link02 == ""){
            this.isAdded02 = false;
            this.inputWidth02 = 0;
            this.imageDisplay02 = "none;";
          }
          if(this.link04 == ""){
            this.isAdded04 = false;
            this.inputWidth04 = 0;
            this.imageDisplay04 = "none;";
          }
          if(this.link05 == ""){
            this.isAdded05 = false;
            this.inputWidth05 = 0;
            this.imageDisplay05 = "none;";
          }
          break;
        case 4:
          this.isAdded04 = true;
          this.inputWidth04 = 300;
          this.imageDisplay04 = "inline;"
          if(this.link01 == ""){
            this.isAdded01 = false;
            this.inputWidth01 = 0;
            this.imageDisplay01 = "none;";
          }
          if(this.link02 == ""){
            this.isAdded02 = false;
            this.inputWidth02 = 0;
            this.imageDisplay02 = "none;";
          }
          if(this.link03 == ""){
            this.isAdded03 = false;
            this.inputWidth03 = 0;
            this.imageDisplay03 = "none;";
          }
          if(this.link05 == ""){
            this.isAdded05 = false;
            this.inputWidth05 = 0;
            this.imageDisplay05 = "none;";
          }
          break;
        case 5:
          this.isAdded05 = true;
          this.inputWidth05 = 300;
          this.imageDisplay05 = "inline;"
          if(this.link01 == ""){
            this.isAdded01 = false;
            this.inputWidth01 = 0;
            this.imageDisplay01 = "none;";
          }
          if(this.link02 == ""){
            this.isAdded02 = false;
            this.inputWidth02 = 0;
            this.imageDisplay02 = "none;";
          }
          if(this.link03 == ""){
            this.isAdded03 = false;
            this.inputWidth03 = 0;
            this.imageDisplay03 = "none;";
          }
          if(this.link04 == ""){
            this.isAdded04 = false;
            this.inputWidth04 = 0;
            this.imageDisplay04 = "none;";
          }
          break;
        default:
          break;
      }
    },
    isEmpty(key) {
      switch (key) {
        case 1:
          if(this.link01 == ''){
            this.isAdded01 = false;
            this.inputWidth01 = 0;
            this.imageDisplay01 = "none;";
          }
          break;
        case 2:
          if(this.link02 == ''){
            this.isAdded02 = false;
            this.inputWidth02 = 0;
            this.imageDisplay02 = "none;";
          }
          break;
        case 3:
          if(this.link03 == ''){
            this.isAdded03 = false;
            this.inputWidth03 = 0;
            this.imageDisplay03 = "none;";
          }
          break;
        case 4:
          if(this.link04 == ''){
            this.isAdded04 = false;
            this.inputWidth04 = 0;
            this.imageDisplay04 = "none;";
          }
          break;
        case 5:
          if(this.link05 == ''){
            this.isAdded05 = false;
            this.inputWidth05 = 0;
            this.imageDisplay05 = "none;";
          }
          break;
      
        default:
          break;
      }
    }
  }
}
</script>

<style>
.links {
  transition-property: height;
  transition-duration: .5s;
}
.links-area {
  transition-property: opacity;
  transition-duration: .5s;
}
.input {
  transition-property: width;
  transition-duration: .5s;
}
</style>