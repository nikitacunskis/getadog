<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

const menu = [
    {
        'label' : 'Website menu',
        'link' : '/dashboard'
    },
    {
        'label' : 'Category menu',
        'link' : '/dashboard/categories'
    },
    {
        'label' : "Pet's menu",
        'link' : '/dashboard/pets'
    },
];

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <DashboardLayout>
                            <div class="grid grid-cols-2 gap-4">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" v-for="item in menu" :href="item.link">
                                    {{item.label}}
                                </a>
                            </div>
                    </DashboardLayout>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
