<script setup>

import AppLayout from '@/Layouts/AppLayout.vue';
const props = defineProps({
    pets: Array,
});

</script>
<template>
    <AppLayout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <a href="/dashboard/pets/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                    <div>
                        <div class="w-full grid grid-cols-2 gap-4" v-for="pet in pets" :key="pet.id">
                            <div class="w-9/12">
                                {{ pet.name }}
                            </div>
                            <div class="w-3/12">
                                <a :href="'/dashboard/pets/'+pet.id" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form :action="'/dashboard/pets/destroy/' + pet.id" method="POST">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>