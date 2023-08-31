  <template>
    <div class="carousel">
      <img 
        v-if="visibleImages.length !== 1"
        :src="this.visibleImages[currentImageIndex - 1].url"
        :alt="'Image ' + (index + 1)"
        class="carousel-image"
        @click="prevImage"
      />
      <img 
        :src="this.visibleImages[currentImageIndex].url"
        :alt="'Image ' + (index + 1)"
        class="carousel-image main-image"
      />
      <img 
        v-if="visibleImages.length !== 1"
        :src="this.visibleImages[currentImageIndex + 1].url"
        :alt="'Image ' + (index + 1)"
        class="carousel-image"
        @click="nextImage"
      />
    </div>
    <Slider 
      :currentIndex="this.currentImageIndex"
      :countable="this.images" 
      class="slider" />
  </template>

  <script>
  import Slider from './Slider.vue';

  export default {
      data() {
          return {
              currentImageIndex: 1,
          };
      },
      props: {
        images: {
          type: Array,
          required: true,
        },
      },
      methods: {
          prevImage() {
              this.currentImageIndex = this.currentImageIndex - 1;
              if (this.currentImageIndex === 0) {
                  this.currentImageIndex = this.images.length;
              }
              console.log(this.currentImageIndex);
          },
          nextImage() {
              this.currentImageIndex = this.currentImageIndex + 1;
              if (this.currentImageIndex === this.images.length + 1) {
                  this.currentImageIndex = 1;
              }
          },
      },
      computed: {
        visibleImages() {
          const lastIndex = this.images.length - 1;
          return [
            this.images[lastIndex],
            ...this.images,
            this.images[0]
          ];
        },
      },
      mounted() {
        if (this.images.length === 0 || this.images.length === 1) {
          this.currentImageIndex = 0;
        }
        console.log(this.images.length)
      },
      components: { Slider }
  };
  </script>

  <style scoped>

  .slider {
    width: 100vw;
    padding-left: 50%;
    padding-top: 20px;
  }
  .carousel {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
    background-color: black;
    color: white;
    width: 100vw;
  }

  .carousel-image {
    width: auto;
    height: 520px;
    opacity: 0.5;
    cursor: pointer;
    transition: opacity 0.3s;
    margin-right: 20px; /* Add 20px margin between images */
  }

  .main-image {
    opacity: 1;
  }

  .carousel-image:hover {
    opacity: 1.0;
  }
  </style>
