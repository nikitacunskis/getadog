    <template>
        <div :class="this.class">
            <label class="block font-medium text-gray-700 mb-2" for="add_option">Category</label>
            <select id="add_option" class="form-select rounded-md shadow-sm block w-full">
                <option v-for="option in options" :value="option.id">{{ option.name }}</option>
            </select>
        </div>
    </template>
    <script>

    export default {
        props: {
            class: {
                type: String,
                required: false,
                default: () => "col-span-2 sm:col-span-1",
            }
        }
    }
    </script>