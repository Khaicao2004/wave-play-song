<template>
    <h1 class="text-3xl text-center mt-5">Create</h1>
   <div class="p-4">
        <form @submit.prevent="createCategory" class="bg-blue-300 p-4">
            <div class="mt-3">
                <label for="">Name:</label>
                <input type="text" v-model="category.name">
            </div>
            <div class="mt-3">
                <label for="">Description:</label>
                <textarea v-model="category.description"></textarea>
            </div>
            <div class="mt-3">
                <label for="">Image:</label>
                <input type="file" @change="inputFile">
            </div>
            <div class="mt-3">
              <button type="submit" class="p-2 bg-black text-white rounded">Create</button>
            </div>
        </form>
   </div>
</template>
<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const category = ref({
    name: '',
    cover_image: null,
    description: ''
});
const router = useRouter();
const inputFile = (event) => {
    category.value.cover_image = event.target.files[0];
}
    const createCategory = async() => {
       try {
            const formData = new FormData();
          
            formData.append('name', category.value.name);
            formData.append('cover_image', category.value.cover_image);
            formData.append('description', category.value.description);
            await axios.post('http://127.0.0.1:8000/api/categories', formData);
            router.push({ name: 'categories-index'});
       } catch (error) {
            console.log(error);
       }
    }
</script>