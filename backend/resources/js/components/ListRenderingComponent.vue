<template>
  <div id="my-list">
    <a href="/posts/new" class="new-post-btn"><button>New</button></a>
    <div class="my-list-header">
      <h1>MyShoes</h1>
      <button class="filter" @click="changeOrder">{{ filter }}</button>
    </div>
    <div class="shoes-list">
      <transition-group name="items" tag="ul">
        <li v-for="item in sortedItemsByCreatedAt" v-bind:key="item.id">
          <a :href="action + item.id.toFixed()"><button>
            <figure>
                <img v-if="item.file_path == null" v-bind:src="'images/no-image.jpg'" alt="no image">
                <img v-else :src="'storage/image/' + item.file_path">
            </figure>
            <figcaption>
              <p class="shoe-name">{{ item.title }}</p>
              <p class="last-maintenance">最後のメンテナンス : {{ item.created_at | moment }}</p>
            </figcaption>
          </button></a>
        </li>
      </transition-group>
    </div>
  </div>
</template>
<script>
import moment from 'moment';
export default {
  data() {
      return {
          action: "/posts/show/",
          sortOrder: 1,
          filter: "New Order",
      }
  },
  props:  {
    items: Array,
  },
  computed: {
    sortedItemsByCreatedAt(){
        return this.items.sort((a, b) => {
          return (a.created_at < b.created_at) ? -this.sortOrder : (a.created_at > b.created_at) ? this.sortOrder : 0;
        });;
    }
  },
  methods: {
    changeOrder(){
      this.sortOrder = this.sortOrder > 0 ? -1 : 1;
      if (this.sortOrder < 1) {
        this.filter = "Registration order";
      }else{
        this.filter = "New Order";
      }
    }
  },
  filters: {
    moment: function (date) {
      return moment(date).format('YYYY/MM/DD');
    },
  }
}
</script>