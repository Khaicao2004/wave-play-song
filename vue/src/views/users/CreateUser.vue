<template>
    <form class="p-4" @submit.prevent="createUser">
        <div class="mt-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" v-model="users.name">
        </div>
        <div class="mt-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" v-model="users.email">
        </div>
        <div class="mt-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" v-model="users.password">
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form> 
</template>

<script setup>
import router from '@/router';
import instandAxios from '@/utils/configAxios';
import { ref } from 'vue';

const users = ref({
    name: '',
    email: '',
    password: ''
});

const createUser = (async() => {
   try {
    const response = await instandAxios.post('users', users.value);
    console.log(1212);
    
   } catch (error) {
    console.log("create error", error);
    
   }
    
})
</script>