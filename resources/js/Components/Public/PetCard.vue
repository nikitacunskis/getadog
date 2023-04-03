<template>
    <div class="card">
      <div class="card-image">
        <img :src="pet.image" alt="card image" />
      </div>
      <div class="card-text">
        <p>{{ pet.name }}, {{ pet.age }}</p>
      </div>
    </div>
  </template>
  
<script>
export default {
  props: {
    pet: {
      type: Object,
      required: true
    }
  }
};
</script>

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
    font-family: 'Gotham Pro', sans-serif;
    font-size: 20pt;
    font-weight: bold;
  }
  </style>
  