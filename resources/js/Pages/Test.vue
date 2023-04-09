<script setup>
  const images = [
    {src:'/files/pet1_cute-pitbull-dog-pics-193057687.jpg'},
    {src:'/files/pet1_th-117354932.jpg'},
    {src:'/files/pet2_th-1436752058.jpg'},
    {src:'/files/pet3_th-3978815186.jpg'},
  ];
</script>
<template>
  <div class="carousel">
    <img v-for="image in images" :src="image.src" class="carousel_item" /> 
  </div>
</template>
<style scoped>
.carousel {
  display: inline-block;
}
.carousel_item {
  max-height: 520px;
  width: auto;
  height: auto;
  vertical-align: top;
}
</style>