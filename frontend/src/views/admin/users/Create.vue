<template>
    <h1 class="text-center text-3xl">hello</h1>
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
import { useRouter } from 'vue-router';

const newUser = ref({
    name: '',
    email: '',
    password: '',
})

const router = useRouter();
// console.log(newUser.name);
    const submitForm = async () => {
        try {
            await axios.post('http://127.0.0.1:8000/api/users', newUser.value);
            newUser.value.name = '';
            newUser.value.email = '';
            newUser.value.password = '';
            router.push({name: 'users-index'});
        } catch (error) {
            console.log(error);
            
        }

        
    }
</script>
<style>
</style>