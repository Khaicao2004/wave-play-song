<template>
    <RouterView />
    <h1 class="text-3xl font-bold text-center mt-5 mb-5">List users</h1>
    
   <div class="p-4">
    <div class="mb-5">
        <RouterLink :to="{name: 'users-create'}" class="p-4 bg-blue-200">Create</RouterLink>
    </div>
    <table class="border-spacing-2  w-full text-center">
        <thead>
            <tr>
                <th class="border">ID</th>
                <th class="border">Name</th>
                <th class="border">Email</th>
                <th class="border">Avatar</th>
                <th class="border">Type</th>
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">
            <td class="border">{{ user.id }}</td>
            <td class="border">{{ user.name }}</td>
            <td class="border">{{ user.email }}</td>
            <td class="border"><img :src="`http://127.0.0.1:8000/storage/${user.avatar}`" alt="User Avatar" class="w-10 h-10"></td>
            <td class="border">{{ user.type }}</td>
            <td class="border">
               <div class="flex justify-center gap-2 p-2">
                    <RouterLink :to="{ name: 'users-show', params: { id: user.id} }" class="bg-blue-500 p-4 w-auto h-auto">Show</RouterLink>
                    <RouterLink :to="{ name: 'users-edit', params: { id: user.id} }" class="bg-yellow-500 p-4 w-auto h-auto">Edit</RouterLink>
                    <button type="button" class="bg-red-500 p-4 w-auto h-auto" @click="deleteUser(user.id)">Delete</button>
               </div>
            </td>
        </tr>
    </tbody>
    </table>
   </div>

    
</template>

<script setup>
import { RouterLink } from 'vue-router';
import axios from 'axios';
import { onMounted, ref } from 'vue';

    const users = ref([]);
    onMounted(() => {
        listUsers();    
    })

    const listUsers = async () => {
        try {
            let response = await axios.get('http://127.0.0.1:8000/api/users');
            users.value = response.data;
        } catch (error) {
            console.log(error);
        }
    }
    const deleteUser = async (id) => {
      try {
        await axios.delete('http://127.0.0.1:8000/api/users/' + id);
        users.value = users.value.filter(user => user.id != id);
      } catch (error) {
        console.log(error);
        
      }
    }
</script>

<style scoped></style>