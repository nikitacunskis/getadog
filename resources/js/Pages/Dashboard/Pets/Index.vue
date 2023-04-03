<template>
  <div>
    <h1>List of Pets</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Size</th>
          <th>Breed</th>
          <th>Gender</th>
          <th>Child</th>
          <th>Cats</th>
          <th>Other Boys</th>
          <th>Other Girls</th>
          <th>Birds</th>
          <th>Stealing</th>
          <th>Demolition</th>
          <th>Activity</th>
          <th>Temperament</th>
          <th>City</th>
          <th>Commands</th>
          <th>Loyal</th>
          <th>Alone</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="pet in pets" :key="pet.id">
          <td>{{ pet.id }}</td>
          <td>{{ pet.name }}</td>
          <td>{{ pet.age }}</td>
          <td>{{ pet.size }}</td>
          <td>{{ pet.breed }}</td>
          <td>{{ pet.gender }}</td>
          <td>{{ pet.child ? 'Yes' : 'No' }}</td>
          <td>{{ pet.cats ? 'Yes' : 'No' }}</td>
          <td>{{ pet.other_boys ? 'Yes' : 'No' }}</td>
          <td>{{ pet.other_girls ? 'Yes' : 'No' }}</td>
          <td>{{ pet.birds ? 'Yes' : 'No' }}</td>
          <td>{{ pet.stealing ? 'Yes' : 'No' }}</td>
          <td>{{ pet.demolition ? 'Yes' : 'No' }}</td>
          <td>{{ pet.activity }}</td>
          <td>{{ pet.temperament }}</td>
          <td>{{ pet.city ? 'Yes' : 'No' }}</td>
          <td>{{ pet.commands }}</td>
          <td>{{ pet.loyal }}</td>
          <td>{{ pet.alone }}</td>
          <td>{{ pet.status }}</td>
          <td>
            <a :href="route('pets.edit', pet.id)">Edit</a>
            <button @click="deletePet(pet.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { usePage, useForm } from '@inertiajs/vue3';

export default {
    setup() {
        const { props } = usePage();

        const deletePet = async (petId) => {
            if (confirm('Are you sure you want to delete this pet?')) {
                useForm({id: petId}).delete(route('pets.destroy', petId));
            }
        };
        return {
            pets: props.pets,
            deletePet
        };
    }
};
</script>
