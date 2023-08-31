<template>
  <ImageCarousel :images="this.images" />
</template>

<script>
import ImageCarousel from '../Components/Public/ImageCarousel.vue';

export default {
    data() {
        return {
            images: [
                {
                  url:"https://via.placeholder.com/1920x1080?text=Image1",
                },
                {
                  url:"https://via.placeholder.com/1920x1080?text=Image2",
                },
                {
                  url:"https://via.placeholder.com/1920x1080?text=Image3",
                },
                {
                  url:"https://via.placeholder.com/1920x1080?text=Image4",
                },
                {
                  url:"https://via.placeholder.com/1920x1080?text=Image5",
                },
            ],
            currentImageIndex: 1,
        };
    },
    components: { ImageCarousel }
};
</script>
