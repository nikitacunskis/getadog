<template>
    <div>
<<<<<<< HEAD
        <h1>Create a Pet</h1>
        <form @submit.prevent="submitForm">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="form.name">
            </div>
            <div>
                <label for="age">Age:</label>
                <input type="number" id="age" v-model="form.age">
            </div>
            <div>
                <label for="size">Size:</label>
                <select id="size" v-model="form.size">
                    <option value="S">Small</option>
                    <option value="M">Medium</option>
                    <option value="L">Large</option>
                </select>
            </div>
            <div>
                <label for="breed">Breed:</label>
                <input type="text" id="breed" v-model="form.breed">
            </div>
            <div>
                <label for="gender">Gender:</label>
                <select id="gender" v-model="form.gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div>
                <label for="child">Good with Children:</label>
                <input type="checkbox" id="child" v-model="form.child">
            </div>
            <div>
                <label for="cats">Good with Cats:</label>
                <input type="checkbox" id="cats" v-model="form.cats">
            </div>
            <div>
                <label for="other_boys">Good with Other Male Dogs:</label>
                <input type="checkbox" id="other_boys" v-model="form.other_boys">
            </div>
            <div>
                <label for="other_girls">Good with Other Female Dogs:</label>
                <input type="checkbox" id="other_girls" v-model="form.other_girls">
            </div>
            <div>
                <label for="birds">Good with Birds:</label>
                <input type="checkbox" id="birds" v-model="form.birds">
            </div>
            <div>
                <label for="stealing">Likes to Steal:</label>
                <input type="checkbox" id="stealing" v-model="form.stealing">
            </div>
            <div>
                <label for="demolition">Likes to Destroy Things:</label>
                <input type="checkbox" id="demolition" v-model="form.demolition">
            </div>
            <div>
                <label for="activity">Activity Level:</label>
                <select id="activity" v-model="form.activity">
                    <option value="Low">Low</option>
                    <option value="Middle">Middle</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div>
                <label for="temperament">Temperament:</label>
                <select id="temperament" v-model="form.temperament">
                    <option value="Introvert">Introvert</option>
                    <option value="Extrovert">Extrovert</option>
                </select>
            </div>
            <div>
                <label for="city">Good for City Living:</label>
                <input type="checkbox" id="city" v-model="form.city">
            </div>
            <div>
                <label for="commands">Commands:</label>
                <textarea name="commands" v-model="form.commands"></textarea>
            </div>
            <div>
                <label for="loyal">Loyal:</label>
                <select name="loyal" v-model="form.loyal">
                <option value="Low">Low</option>
                <option value="Middle">Middle</option>
                <option value="High">High</option>
                </select>
            </div>
            <div>
                <label for="alone">Alone:</label>
                <input type="number" name="alone" v-model="form.alone">
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
  import { useForm } from '@inertiajs/vue3';

  export default {
    setup() {
      const { data: errors, post } = useForm({
        name: '',
        age: null,
        size: '',
        breed: '',
        gender: '',
        child: false,
        cats: false,
        other_boys: false,
        other_girls: false,
        birds: false,
        stealing: false,
        demolition: false,
        activity: '',
        temperament: '',
        city: false,
        commands: '',
        loyal: '',
        alone: null,
      })

      function submitForm() {
        post('/dashboard/pets', {
          name: form.name,
          age: form.age,
          size: form.size,
          breed: form.breed,
          gender: form.gender,
          child: form.child,
          cats: form.cats,
          other_boys: form.other_boys,
          other_girls: form.other_girls,
          birds: form.birds,
          stealing: form.stealing,
          demolition: form.demolition,
          activity: form.activity,
          temperament: form.temperament,
          city: form.city,
          commands: form.commands,
          loyal: form.loyal,
          alone: form.alone,
        })
      }

      return { form, errors, submitForm }
    },
  }
</script>
=======
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
            // Use Inertia to submit the form data to the server
            this.$inertia.post('/pets', this.form)
            .then(response => {
                this.$inertia.visit(response.data.redirect_to)
            })
            .catch(error => {
                console.log(error)
            })
        }
      }
    }
  </script>
  
>>>>>>> 8974eb26cd7462531ddf381a4c9089b56051a1f7
