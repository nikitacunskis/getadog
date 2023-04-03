<template>
    <div class="py-10 flex justify-center">
    </div>
</template>
  
<script>
    import PetCard from '@/Components/Public/PetCard.vue'

    export default {
        components: { PetCard }, 
        data() {
            return {
                cards: [
                {
                    image: "https://via.placeholder.com/460x260",
                    name: "Pokki",
                    age: "1",
                },
                {
                    image: "https://via.placeholder.com/460x260",
                    name: "Šarik",
                    age: "8",
                },
                {
                    image: "https://via.placeholder.com/460x260",
                    name: "Cooper",
                    age: "0",
                },
                {
                    image: "https://via.placeholder.com/460x260",
                    name: "Strudel",
                    age: "4",
                },
                {
                    image: "https://via.placeholder.com/460x260",
                    name: "Pokki",
                    age: "1",
                },
                {
                    image: "https://via.placeholder.com/460x260",
                    name: "Šarik",
                    age: "8",
                },
                ],
            };
        },
    };
</script>
  