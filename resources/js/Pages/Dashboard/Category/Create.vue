<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Axios from 'axios';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

const props = defineProps({
    categories: Object,
});

console.log(props.images);

const form = useForm({
    name: "",
    tag: "",
    status: "",
});

const submitForm = () => {
    form.post(route('categories.store'));
}
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
                        <div class="max-w-2xl mx-auto mt-8">
                            <form @submit.prevent="submitForm">
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="col-span-2 sm:col-span-1">
                                        <h1 class="text-2xl font-bold mb-4">Create Category</h1>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <button @click="submitForm" class="btn float-right">Save</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="name">Name</label>
                                        <input type="text" name="name" id="name" v-model="form.name" class="form-input rounded-md shadow-sm block w-full">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="tag">Route Tag</label>
                                        <input type="text" name="tag" id="tag" v-model="form.tag" class="form-input rounded-md shadow-sm block w-full">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="status">Status</label>
                                        <select id="status" v-model="form.status" class="form-select rounded-md shadow-sm block w-full">
                                            <option value="1">Active</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </DashboardLayout>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
.btn {
  background-color: #007bff;
  border: none;
  color: #fff;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}
.btn:hover {
  background-color: #0069d9;
}

.btn-upload {
  border-top: 1px dotted black;
  border-bottom: 1px dotted black;
  border-left: 1px dotted black;
  color: #000;
  padding: 30px 200px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}

.btn-plus {
  border-top: 1px dotted black;
  border-bottom: 1px dotted black;
  border-right: 1px dotted black;
  color: #000;
  padding: 34px 34px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  background-color: rgb(238, 238, 238);
}


</style>
