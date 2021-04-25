<template>
  <div id="my-list">
    <a href="/posts/new" class="new-post-btn"><button>New</button></a>
    <div class="my-list-header">
      <h1>MyShoes</h1>
      <button class="filter" @click="changeOrder">Filter</button>
    </div>
    <div class="shoes-list">
      <ul>
        <li v-for="item in items" v-bind:key="item.created_at">
          <a :href="action + item.id.toFixed()"><button>
            <figure>
                <img v-if="item.file_path == ''" src="images/no-image.jpg" alt="no image">
                <img v-else :src="'storage/image/' + item.file_path">
            </figure>
            <figcaption>
              <p class="shoe-name">{{ item.title }}</p>
              <p class="last-maintenance">最後のメンテンナンス {{ item.created_at | moment }}</p>
            </figcaption>
          </button></a>
        </li>
      </ul>
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
      }
  },
  props:  {
    items: Object,
  },
  computed: {
  // 配列の要素順番を逆順にする
    reverseItems() {
      return this.items.slice().reverse(); 
    }
  },
  methods: {
    changeOrder(){
      this.sortOrder = this.sortOrder > 0 ? -1 : 1;
    }
  },
  filters: {
    moment: function (date) {
      return moment(date).format('YYYY/MM/DD');
    },
  }
}
</script>