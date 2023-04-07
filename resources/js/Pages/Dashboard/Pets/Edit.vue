<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Axios from 'axios';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

const props = defineProps({
    pet: Object,
    categories: Object,
    images: Object,
});

console.log(props.images);

const form = useForm({
    name: props.pet.name,
    age: props.pet.age,
    size: props.pet.size,
    breed: props.pet.breed,
    gender: props.pet.gender,
    child: props.pet.child,
    cats: props.pet.cats,
    other_boys: props.pet.other_boys,
    other_girls: props.pet.other_girls,
    birds: props.pet.birds,
    stealing: props.pet.stealing,
    demolition: props.pet.demolition,
    activity: props.pet.activity,
    temperament: props.pet.temperament,
    city: props.pet.city,
    commands: props.pet.commands,
    loyal: props.pet.loyal,
    alone: props.pet.alone,
    status: props.pet.status,
    category_id: props.pet.category_id
});

const submitForm = () => {
    form.patch(route('pets.update', {pet: props.pet.id}));
}

const uploadFile = (event) => {
    let file = event.target.files[0];
    let formData = new FormData();
    formData.append('file', file);
    formData.append('id', props.pet.id);

    Axios.post('/dashboard/pets/upload/' + props.pet.id, formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
        window.location.reload();
    })
    .catch(error => {
        console.log(error);
    });
}

const deleteImage = (filename) => {
    console.log(filename);

    // let formData = new FormData();
    // formData.append('file', filename);
    Axios.delete('/dashboard/pet/deleteimage/' + filename)
    .then(response => {
        props.images = props.images.filter(image => image.url !== filename);
        window.location.reload();
    })
    .catch(error => {
        console.log(error);
    });
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
                                        <h1 class="text-2xl font-bold mb-4">Edit Pet</h1>
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
                                        <label class="block font-medium text-gray-700 mb-2" for="age">Age</label>
                                        <input type="text" name="age" id="age" v-model="form.age" class="form-input rounded-md shadow-sm block w-full">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="size">Size</label>
                                        <select id="size" v-model="form.size" class="form-select rounded-md shadow-sm block w-full">
                                            <option value="S">Small</option>
                                            <option value="M">Middle</option>
                                            <option value="L">Large</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="category_id">Category</label>
                                        <select id="category_id" v-model="form.category_id" class="form-select rounded-md shadow-sm block w-full">
                                            <option v-for="category in props.categories" :value="category.id">{{ category.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="breed">Breed</label>
                                        <input type="text" name="breed" id="breed" v-model="form.breed" class="form-input rounded-md shadow-sm block w-full">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="gender">Gender</label>
                                        <select name="gender" id="gender" v-model="form.gender" class="form-select rounded-md shadow-sm block w-full">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="commands">Commands</label>
                                        <input type="text" id="commands" v-model="form.commands" class="form-input rounded-md shadow-sm block w-full">
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="loyal">Loyal</label>
                                        <select id="loyal" v-model="form.loyal" class="form-select rounded-md shadow-sm block w-full">
                                            <option value="Low">Low</option>
                                            <option value="Middle">Middle</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="activity">Activity</label>
                                        <select id="activity" v-model="form.activity" class="form-select rounded-md shadow-sm block w-full">
                                            <option value="Low">Low</option>
                                            <option value="Middle">Middle</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="temperament">Temperament</label>
                                        <select id="temperament" v-model="form.temperament" class="form-select rounded-md shadow-sm block w-full">
                                            <option value="Introvert">Introvert</option>
                                            <option value="Extravert">Extravert</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="child">Child</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="child" value="1" v-model="form.child" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="child" value="0" v-model="form.child" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="cats">Cats</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="cats" value="1" v-model="form.cats" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="cats" value="0" v-model="form.cats" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="other_boys">Other Boys</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="other_boys" value="1" v-model="form.other_boys" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="other_boys" value="0" v-model="form.other_boys" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="other_girls">Other Girls</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="other_girls" value="1" v-model="form.other_girls" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="other_girls" value="0" v-model="form.other_girls" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="birds">
                                        Birds
                                        </label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="birds" value="1" v-model="form.birds" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="birds" value="0" v-model="form.birds" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="stealing">Stealing</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="stealing" value="1" v-model="form.stealing" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="stealing" value="0" v-model="form.stealing" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="demolition">Demolition</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="demolition" value="1" v-model="form.demolition" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="demolition" value="0" v-model="form.demolition" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="city">City</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="city" value="1" v-model="form.city" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="city" value="0" v-model="form.city" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="alone">Stay alone</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="alone" value="1" v-model="form.alone" class="form-radio">
                                                    <span class="ml-2">Yes</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="alone" value="0" v-model="form.alone" class="form-radio">
                                                    <span class="ml-2">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1">
                                        <label class="block font-medium text-gray-700 mb-2" for="status">Status</label>
                                        <div class="mt-2 space-y-4">
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" value="adopted" v-model="form.status" class="form-radio">
                                                    <span class="ml-2">Adopted</span>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" value="open" v-model="form.status" class="form-radio">
                                                    <span class="ml-2">Open</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="w-full border-collapse">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th class="px-4 py-2 text-left">Image</th>
                                                    <th class="px-4 py-2 text-left">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="image in images" :key="image.id">
                                                    <td class="border-t">
                                                        <img :src="'/files/' + image.url" />
                                                    </td>
                                                    <td class="border-t">
                                                        <button @click="deleteImage(image.url)">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="border-2 border-green-500 border-dashed rounded-md p-4">
                                            <input type="file" @change="uploadFile">
                                        </div>

                                    </div>
                                </div>
                            </div>
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
