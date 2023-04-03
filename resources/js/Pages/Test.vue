<<<<<<< HEAD
<template>
    <PublicLayout>
        <div class="grid grid-cols-2 gap-4 md:gap-8 lg:gap-12">
            <PetCard v-for="(pet, index) in pets" :key="index" 
            :pet="pet"/>
        </div>
    </PublicLayout>
  </template>
  
  <script>
    import PublicLayout from '@/Layouts/PublicLayout.vue';
    import PetCard from '@/Components/Public/PetCard.vue'
    import axios from 'axios';
    
    export default {
        name: 'TestComponent',
        components: { PublicLayout, PetCard },
        data() {
            return {
                pets: [],
            };
        },
        mounted() {
          axios.get('/api/pets/dogs')
            .then(response => {
              this.pets = response.data;
            })
            .catch(error => {
              console.error(error);
            });
        },
    };
  </script>
  
  <style>
    body {
        background: #F8FAFC;
    }
  </style>
=======
<script setup>
let test = "Hello, World!";
</script>

<template>
    Test: <p>{{ test }}</p>
</template>
>>>>>>> 8974eb26cd7462531ddf381a4c9089b56051a1f7
