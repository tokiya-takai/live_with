<template>
  <div class="links" :style="'height:' + height + 'px;'">
    <button class="links-area-btn" v-bind:class="{active: isActive}" @click="openLinksArea()"><img src="/images/link.png"></button>
    <div class="links-area" :style="'opacity:'+opacity+';'">
      <div class="link-group">
        <div v-if="! isAdded01 && link01 == ''"><button @click="showInput(1)"><img src="/images/add-link.png"></button></div>
        <input :type="inputType01" v-model="link01" v-on:blur="isEmpty(1)" style="border-bottom: 1px solid #aaa">
      </div>
      <div class="link-group">
        <div v-if="! isAdded02 && link02 == ''"><button @click="showInput(2)"><img src="/images/add-link.png"></button></div>
        <input :type="inputType02" v-model="link02" v-on:blur="isEmpty(2)" style="border-bottom: 1px solid #aaa">
      </div>
      <div class="link-group">
        <div v-if="! isAdded03 && link03 == ''"><button @click="showInput(3)"><img src="/images/add-link.png"></button></div>
        <input :type="inputType03" v-model="link03" v-on:blur="isEmpty(3)" style="border-bottom: 1px solid #aaa">
      </div>
      <div class="link-group">
        <div v-if="! isAdded04 && link04 == ''"><button @click="showInput(4)"><img src="/images/add-link.png"></button></div>
        <input :type="inputType04" v-model="link04" v-on:blur="isEmpty(4)" style="border-bottom: 1px solid #aaa">
      </div>
      <div class="link-group">
        <div v-if="! isAdded05 && link05 == ''"><button @click="showInput(5)"><img src="/images/add-link.png"></button></div>
        <input :type="inputType05" v-model="link05" v-on:blur="isEmpty(5)" style="border-bottom: 1px solid #aaa">
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      height: 30,
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
      inputType01: "hidden",
      inputType02: "hidden",
      inputType03: "hidden",
      inputType04: "hidden",
      inputType05: "hidden",
    }
  },
  props: {
    links: Array,
  },
  methods: {
    openLinksArea() {
      if(this.isActive){
        this.height = 30;
        this.opacity = 0;
      } else {
        this.height = 200;
        this.opacity = 1;
      }
      this.isActive = ! this.isActive;
    },
    showInput(key) {
      switch (key) {
        case 1:
          this.inputType01 = "url";
          this.isAdded01 = true;
          if(this.link02 == ""){
            this.inputType02 = "hidden";
            this.isAdded02 = false;
          }
          if(this.link03 == ""){
            this.inputType03 = "hidden";
            this.isAdded03 = false;
          }
          if(this.link04 == ""){
            this.inputType04 = "hidden";
            this.isAdded04 = false;
          }
          if(this.link05 == ""){
            this.inputType05 = "hidden";
            this.isAdded05 = false;
          }
          break;
        case 2:
          this.inputType02 = "url";
          this.isAdded02 = true;
          if(this.link01 == ""){
            this.inputType01 = "hidden";
            this.isAdded01 = false;
          }
          if(this.link03 == ""){
            this.inputType03 = "hidden";
            this.isAdded03 = false;
          }
          if(this.link04 == ""){
            this.inputType04 = "hidden";
            this.isAdded04 = false;
          }
          if(this.link05 == ""){
            this.inputType05 = "hidden";
            this.isAdded05 = false;
          }
          break;
        case 3:
          this.inputType03 = "url";
          this.isAdded03 = true;
          if(this.link01 == ""){
            this.inputType01 = "hidden";
            this.isAdded01 = false;
          }
          if(this.link02 == ""){
            this.inputType02 = "hidden";
            this.isAdded02 = false;
          }
          if(this.link04 == ""){
            this.inputType04 = "hidden";
            this.isAdded04 = false;
          }
          if(this.link05 == ""){
            this.inputType05 = "hidden";
            this.isAdded05 = false;
          }
          break;
        case 4:
          this.inputType04 = "url";
          this.isAdded04 = true;
          if(this.link01 == ""){
            this.inputType01 = "hidden";
            this.isAdded01 = false;
          }
          if(this.link02 == ""){
            this.inputType02 = "hidden";
            this.isAdded02 = false;
          }
          if(this.link03 == ""){
            this.inputType03 = "hidden";
            this.isAdded03 = false;
          }
          if(this.link05 == ""){
            this.inputType05 = "hidden";
            this.isAdded05 = false;
          }
          break;
        case 5:
          this.inputType05 = "url";
          this.isAdded05 = true;
          if(this.link01 == ""){
            this.inputType01 = "hidden";
            this.isAdded01 = false;
          }
          if(this.link02 == ""){
            this.inputType02 = "hidden";
            this.isAdded02 = false;
          }
          if(this.link03 == ""){
            this.inputType03 = "hidden";
            this.isAdded03 = false;
          }
          if(this.link04 == ""){
            this.inputType04 = "hidden";
            this.isAdded04 = false;
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
            this.inputType01 = "hidden";
          }
          break;
        case 2:
          if(this.link02 == ''){
            this.isAdded02 = false;
            this.inputType02 = "hidden";
          }
          break;
        case 3:
          if(this.link03 == ''){
            this.isAdded03 = false;
            this.inputType03 = "hidden";
          }
          break;
        case 4:
          if(this.link04 == ''){
            this.isAdded04 = false;
            this.inputType04 = "hidden";
          }
          break;
        case 5:
          if(this.link05 == ''){
            this.isAdded05 = false;
            this.inputType05 = "hidden";
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
  transition-duration: .6s;
}
.links-area {
  transition-property: opacity;
  transition-duration: .6s;
}
</style>