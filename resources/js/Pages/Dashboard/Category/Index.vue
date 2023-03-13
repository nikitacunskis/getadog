<script setup>

import AppLayout from '@/Layouts/AppLayout.vue';
const props = defineProps({
    categories: Array,
});

console.log(props.categories);
</script>
<template>
    <AppLayout title="Dashboard">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                    <div>
                        <div class="w-full grid grid-cols-2 gap-4" v-for="category in categories" :key="category.id">
                            <div class="w-9/12">
                                {{ category.name }}
                            </div>
                            <div class="w-3/12">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                <button class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>