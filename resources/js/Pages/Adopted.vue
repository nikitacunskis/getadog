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
    name: 'Main Page',
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
        console.log(this.pets);
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
