<template>
    <h1>List users</h1>
   <div class="p-4">
    <table class="border border-spacing-2 w-full text-center">
        <thead>
            <tr>
                <th class="border border-spacing-2">ID</th>
                <th class="border border-spacing-2">Name</th>
                <th class="border border-spacing-2">Email</th>
                <th class="border border-spacing-2">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users">
            <td class="border border-spacing-2">{{ user.id }}</td>
            <td class="border border-spacing-2">{{ user.name }}</td>
            <td class="border border-spacing-2">{{ user.email }}</td>
            <td class="border border-spacing-2">{{ user.type }}</td>
        </tr>
    </tbody>
    </table>
   </div>

    
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

    const users = ref([]);

    onMounted( async () => {
        let response = await axios.get('http://127.0.0.1:8001/api/users');
        users.value = response.data;
    })
</script>

<style scoped></style>