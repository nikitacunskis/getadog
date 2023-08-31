<template>
  <PublicLayout>
    <div class="content-container">
      <div>
        <ImageCarousel v-if="images" :images="images" />
      </div>
      <div>
        <div class="card">
          <div class="card-text">
            <div class="pet-header">
              <h2>{{ pet.name }}, {{ pet.age }} years</h2>
              <span class="grey-500">{{ pet.breed }}</span>
            </div>
            <div class="pet-details">
              <p><strong>Name:</strong> {{ pet.name }}</p>
              <p><strong>Age:</strong> {{ pet.age }} years</p>
              <p><strong>Size:</strong> {{ pet.size }}</p>
              <p><strong>Breed:</strong> {{ pet.breed }}</p>
              <p><strong>Gender:</strong> {{ pet.gender }}</p>
              <p><strong>Child-Friendly:</strong> {{ pet.child }}</p>
              <p><strong>Cat-Friendly:</strong> {{ pet.cats }}</p>
              <p><strong>Gets Along with Other Dogs (Males):</strong> {{ pet.other_boys }}</p>
              <p><strong>Gets Along with Other Dogs (Females):</strong> {{ pet.other_girls }}</p>
              <p><strong>Gets Along with Birds:</strong> {{ pet.birds }}</p>
              <p><strong>Tendency to Steal:</strong> {{ pet.stealing }}</p>
              <p><strong>Tendency for Demolition:</strong> {{ pet.demolition }}</p>
              <p><strong>Activity Level:</strong> {{ pet.activity }}</p>
              <p><strong>Temperament:</strong> {{ pet.temperament }}</p>
              <p><strong>City:</strong> {{ pet.city }}</p>
              <p><strong>Trained Commands:</strong> {{ pet.commands }}</p>
              <p><strong>Loyal:</strong> {{ pet.loyal }}</p>
              <p><strong>Can Be Left Alone:</strong> {{ pet.alone }}</p>
              <p><strong>Status:</strong> {{ pet.status }}</p>
              <p><strong>Category ID:</strong> {{ pet.category.name }}</p>

              <!-- Add sliders for Size, Activity Level, and Loyal -->
              <p><strong>Size:</strong> <input type="range" min="1" max="10" value="{{ pet.size }}" class="slider">{{ pet.size }}</p>
              <p><strong>Activity Level:</strong> <input type="range" min="1" max="10" value="{{ pet.activity }}" class="slider">{{ pet.activity }}</p>
              <p><strong>Loyal:</strong> <input type="range" min="1" max="10" value="{{ pet.loyal }}" class="slider">{{ pet.loyal }}</p>
              <!-- Continue with other details -->
            </div>
            <div class="pet-description">
              <h3>Description:</h3>
              <p>{{ pet.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </PublicLayout>
</template>

<!-- ... rest of the code remains the same ... -->


<script>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import ImageCarousel from '@/Components/Public/ImageCarousel.vue';

export default {
  components: {
    PublicLayout,
    ImageCarousel,
  },
  data() {
    return {
      currentImageIndex: null,
      images: null,
      pet: null,
    };
  },
  mounted() {
    console.log(window.translations); // Check if the translations are available
    console.log(this.$t('welcome')); // Outputs the translated string
  },
  async created() {
    try {
      const currentUrl = window.location.href;
      const paramValue = currentUrl.split('/').pop();
      const petResponse = await fetch('/api/pet/' + paramValue);
      const petData = await petResponse.json();
      petData.images = Object.values(petData.images).map(image => {
        return {
          id: image.id,
          pet_id: image.pet_id,
          url: '/files/' + image.url
        };
      })
      this.pet = petData.pet;
      this.images = petData.images;
    } catch (error) {
      console.error(error);
    }
  }
};

</script>

<style>
body {
  background: #F8FAFC;
}

.content-container {
  display: block; 
  margin-left: auto;
  margin-right: auto;
}

.card {
  width: 940px;
  border-radius: 4px;
  border: 1px solid #E2E8F0;
  display: block;
  margin-top: 50px; 
  margin-left: auto;
  margin-right: auto;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
  background-color: #FFFFFF;
  padding: 32px;
}

.card-body {
  padding: 32px;
  color: #1A202C;
  font-family: 'Gotham Pro', sans-serif;
  font-size: 12pt;
  font-weight: regular;
}

.social-networks a {
  display: inline-block;
  padding-right: 24px;
}

.contacts-item {
  display: flex;
  align-items: center;
  padding-bottom: 24px;
}

.contacts-item > * {
  margin-right: 12px;
}

.contacts-item img {
  width: 24px;
  height: 24px;
}

.pet-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.pet-header h2 {
  margin: 0;
  font-size: 24px;
}

.grey-500 {
  color: #888;
}

.pet-details p {
  margin: 5px 0;
}

.pet-description {
  margin-top: 20px;
}

.pet-description h3 {
  margin: 0;
  font-size: 18px;
}

.pet-description p {
  margin-top: 10px;
}
</style>