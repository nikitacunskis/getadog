<script setup>
import VueSlickCarousel from 'vue-slick-carousel';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';

const props = defineProps({
    images: Object,
});

const images = [
    { name: 'Item 1', image: '/path/to/image1.jpg' },
    { name: 'Item 2', image: '/path/to/image2.jpg' },
    { name: 'Item 3', image: '/path/to/image3.jpg' },
];
</script>
<template>
    <div>
      <vue-slick-carousel
        :autoplay="true"
        :dots="true"
        :arrows="true"
        :infinite="true"
        :speed="500"
        :slidesToShow="1"
        :slidesToScroll="1"
      >
        <div v-for="(item, index) in items" :key="index">
          <img :src="item.image" :alt="item.name" />
          <h3>{{ item.name }}</h3>
        </div>
      </vue-slick-carousel>
    </div>
</template>
  
<style scoped>

</style>
  