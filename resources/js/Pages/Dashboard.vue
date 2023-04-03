<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
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
<<<<<<< HEAD
                    <DashboardLayout>
                        <p>blah blah blah</p>
                    </DashboardLayout>
=======
                    <ul>
                        <a href="/dashboard/categories/">Categories</a>
                    </ul>
                    <ul>
                        <a href="/dashboard/pets/">Pets</a>
                    </ul>
>>>>>>> 8974eb26cd7462531ddf381a4c9089b56051a1f7
                </div>
            </div>
        </div>
    </AppLayout>
</template>
