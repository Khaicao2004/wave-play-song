<template>
    <RouterView />
    <h1 class="text-3xl font-bold text-center mt-5 mb-5">List users</h1>
    
   <div class="p-4">
    <div class="mb-5">
        <RouterLink :to="{name: 'users-create'}" class="p-4 bg-blue-400">Create</RouterLink>
    </div>
    <table class="border  w-full text-center">
        <thead>
            <tr>
                <th class="border">ID</th>
                <th class="border">Name</th>
                <th class="border">Email</th>
                <th class="border">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users">
            <td class="border">{{ user.id }}</td>
            <td class="border">{{ user.name }}</td>
            <td class="border">{{ user.email }}</td>
            <td class="border">{{ user.type }}</td>
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

    onMounted( async () => {
        let response = await axios.get('http://127.0.0.1:8001/api/users');
        users.value = response.data;
    })
</script>

<style scoped></style>