<template>
    <div>
      <form @submit.prevent="handleSubmit">
        <div>
          <label>Name:</label>
          <input type="text" v-model="form.name" required>
        </div>
        <div>
          <label>Age:</label>
          <input type="number" v-model="form.age" required>
        </div>
        <div>
          <label>Gender:</label>
          <select v-model="form.gender" required>
            <option value="">Please select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div>
          <label>Category:</label>
          <select v-model="form.category_id" required>
            <option value="">Please select</option>
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
          </select>
        </div>
        <div>
          <label>Description:</label>
          <textarea v-model="form.description"></textarea>
        </div>
        <button type="submit">Create Pet</button>
      </form>
    </div>
  </template>
  
  <script>
    export default {
      data() {
        return {
          form: {
            name: '',
            age: '',
            gender: '',
            category_id: '',
            description: ''
          },
          categories: []
        }
      },
      mounted() {
        this.loadCategories()
      },
      methods: {
        loadCategories() {
          // Make an API request to load the categories
          axios.get('/api/categories')
            .then(response => {
              this.categories = response.data.categories;
              console.log(response);
            })
            .catch(error => {
              console.log(error)
            })
        },
        handleSubmit() {
          // Make an API request to create the pet
          axios.post('/api/pets', this.form)
            .then(response => {
              this.$router.push('/pets/' + response.data.id)
            })
            .catch(error => {
              console.log(error)
            })
        }
      }
    }
  </script>
  