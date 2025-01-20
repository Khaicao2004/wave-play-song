<template>
    <h1 class="text-center text-3xl mt-5">Login</h1>
   <form @submit.prevent="login" class="bg-blue-200 p-4">
        <div class="mt-3">
            <label for="">Email</label>
            <input type="text" v-model="data.email" class="border border-black">
        </div>
        <div class="mt-3">
            <label for="">Password</label>
            <input type="text" v-model="data.password" class="border border-black">
        </div>
        <div class="mt-3">
           <button type="submit" class="p-2 bg-black text-white rounded">Login</button>
        </div>
   </form>
</template>

<script setup>
   import { ref } from 'vue';
   import axios from 'axios';

    const data = ref({
        email: '',
        password: ''
    });
   const login = async () => {
      await axios.post('http://127.0.0.1:8000/api/auth/login', data.value);    
   }
    
</script>