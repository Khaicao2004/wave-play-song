<template>
    <h1 class="text-center text-3xl">hello</h1>
    <form @submit.prevent="submitForm">
        <input type="text" v-model="newUser.name" class="border">
        <input type="text" v-model="newUser.email" class="border">
        <input type="text" v-model="newUser.password" class="border">
        <input type="file" @change="uploadFile">
       <div class="mt-5" v-if="image">
            <img :src="image" alt="" class="w-20 h-20">
       </div>
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
    avatar: null,
    password: '',
})
const image = ref(null);
const router = useRouter();

    const uploadFile = (event) => {
        const file = event.target.files[0];
        image.value = URL.createObjectURL(file)      
        newUser.value.avatar = file;   
    }
    const submitForm = async () => {
        try {
            const formData = new FormData();
            formData.append('name',newUser.value.name);
            formData.append('email',newUser.value.email);
            formData.append('avatar',newUser.value.avatar);
            formData.append('password',newUser.value.password);
            
            await axios.post('http://127.0.0.1:8000/api/users', formData);
            newUser.value.name = '';
            newUser.value.email = '';
            newUser.value.avatar = null;
            newUser.value.password = '';
            router.push({name: 'users-index'});
        } catch (error) {
            console.log(error);
            
        }

        
    }
</script>
<style>
</style>