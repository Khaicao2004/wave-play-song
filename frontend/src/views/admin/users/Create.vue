<template>
    <h1 class="text-center text-3xl">hello</h1>
    <p>Data: {{ newUser }}</p>
    <form @submit.prevent="submitForm()">
        <input type="text" v-model="newUser.name" class="border">
        <input type="text" v-model="newUser.email" class="border">
        <input type="text" v-model="newUser.password" class="border">
        <button type="submit" class="bg-blue-500 p-4">Submit</button>
    </form>

</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const newUser = ref({
    name: '',
    email: '',
    password: '',
})
// console.log(newUser.name);
    const submitForm = async () => {
       await axios.post('http://127.0.0.1:8001/api/users', newUser)
        
    }
</script>
<style>
</style>