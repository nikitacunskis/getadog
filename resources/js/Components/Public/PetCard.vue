<script setup>

const props = defineProps({
    pet: Object,
});

const image = props.pet.pet_image.length === 0 ? 'pet_placeholder.jpg' : props.pet.pet_image[0].url;

const openPet = (id) => {
  window.location.href = '/pet/' + id;
}

</script>
<template>
  <div class="card" @click="openPet(props.pet.id)">
    <div class="card-image">
      <img :src="'/files/' + image" alt="card image" />
    </div>
    <div class="card-text">
      <p>{{ pet.name }}, {{ pet.age }}</p>
    </div>
  </div>
</template>
  

  <style scoped>
  .card {
    width: 460px;
    height: 324px;
    border-radius: 4px;
    border: 1px solid #E2E8F0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    background-color: #FFFFFF;
  }
  .card:hover {
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .card-image {
    height: 260px;
    width: 100%;
    overflow: hidden;
  }
  
  .card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .card-text {
    padding: 20px;
    color: #1A202C;
    font-family: 'Raleway', sans-serif;
    font-size: 20pt;
    font-weight: bold;
  }
  </style>
  