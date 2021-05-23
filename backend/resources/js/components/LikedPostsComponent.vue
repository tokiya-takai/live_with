<template>
  <div id="my-likes">
    <div class="likes-list-title">
      <h1>My Likes</h1>
      <button class="filter" @click="changeOrder">{{ filter }}</button>
    </div>
    <div class="likes-list">
      <transition-group name="items" tag="ul">
        <li v-for="item in sortedItemsByUpdateDate" v-bind:key="item.post_id">
          <a :href="action + item.post_id.toFixed()"><button>
              <figure>
                  <div>
                    <img v-if="item.file_path == null" v-bind:src="'images/no-image.jpg'" alt="no image">
                    <img v-else :src="item.file_path">
                  </div>
              </figure>
              <figcaption>
                <p class="shoe-name">{{ item.title }}</p>
                <p class="owner-name">OWNER : {{ item.name }}</p>
              </figcaption>
          </button></a>
        </li>
      </transition-group>
    </div>
  </div>
</template>

<script>
export default {
  data() {
      return {
          action: "/posts/show/",
          sortOrder: 1,
          filter: "Update Order",
      }
  },
  props: {
    items: Array,
  },
  computed: {
    sortedItemsByUpdateDate(){
        return this.items.sort((a, b) => {
          return (a.update_date < b.update_date) ? -this.sortOrder : (a.update_date > b.update_date) ? this.sortOrder : 0;
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
}
</script>