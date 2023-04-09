<script setup>
const props = defineProps({
    images: Object,
});
console.log(props);
</script>
<template>
  <div class="carousel">
    <img v-for="image in props.images" :src="image.src" class="carousel_item" />
  </div>
</template>