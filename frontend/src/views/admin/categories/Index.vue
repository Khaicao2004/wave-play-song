<template>
    <h1 class="text-3xl text-center mt-5 font-semibold">List categories</h1>
    <div class="p-4">
    <div class="mb-5">
        <RouterLink :to="{name: 'categories-create'}" class="p-4 bg-blue-200">Create</RouterLink>
    </div>
    <table class="border-x-neutral-950 border-spacing-2  w-full text-center overflow-auto">
        <thead>
            <tr>
                <th class="border">ID</th>
                <th class="border">Name</th>
                <th class="border">Avatar</th>
                <th class="border">Description</th>
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="category in categories" :key="category.id">
            <td class="border">{{ category.id }}</td>
            <td class="border">{{ category.name }}</td>
            
            <td class="border">
                <img :src="`http://127.0.0.1:8000/storage/${category.cover_image}`" alt="category Avatar" class="w-10 h-10" v-if="category.cover_image">
                <span v-else>No Image</span>
            </td>
            <td class="border">{{ category.description }}</td>
            <td class="border">
               <div class="flex justify-center gap-2 p-2">
                    <RouterLink :to="{ name: 'categories-show', params: { id: category.id} }" class="bg-blue-500 p-4 w-20 h-auto rounded">Show</RouterLink>
                    <RouterLink :to="{ name: 'categories-edit', params: { id: category.id} }" class="bg-yellow-500 p-4 w-20 h-auto rounded">Edit</RouterLink>
                    <button type="button" class="bg-red-500 p-4 w-20 h-auto rounded" @click="deleteCategory(category.id)">Delete</button>
               </div>
            </td>
        </tr>
    </tbody>
    </table>
   </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref  } from 'vue';


    const categories = ref([]);

    onMounted(() => {
        fecthListCategories();
    })

    const fecthListCategories = async () => {
       try {
            let response = await axios.get('http://127.0.0.1:8000/api/categories');
            categories.value = response.data;
       } catch (error) {
            console.log(error);
       }
    }
    
    const deleteCategory = (id) => {
        try {
            axios.delete('http://127.0.0.1:8000/api/categories/' + id);
            categories.value = categories.value.filter(category => category.id != id);
        } catch (error) {
            console.log(error);       
        }
    }
</script>