<template>
  <div id="my-likes">
    <div class="likes-list">
      <!-- <transition-group name="items" tag="ul">
        <li v-for="item in items">
          <a :href="action + item.id.toFixed()"><button>
            <figure>
                <img v-if="item.post.file_path == null" v-bind:src="'images/no-image.jpg'" alt="no image">
                <img v-else :src="item.post.file_path">
            </figure>
            <figcaption>
              <p class="shoe-name">{{ item.post.title }}</p>
              <p class="owner-name">{{ item.post.user.name }}</p>
            </figcaption>
          </button></a>
        </li>
      </transition-group> -->
      <ul>
        <li v-for="item in items">
          <p>{{ item.name }}</p>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
      return {
          action: "/posts/show/",
      }
  },
  props: {
    items: Array,
  }
}
</script>