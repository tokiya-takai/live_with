<template>
</template>

<script>
export default {
  props: {
    csrf: {
      type: String,
      required: true,
    },
    id: Number,
    comments: Object,
  }
}
</script>