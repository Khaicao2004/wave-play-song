<template>
    <h1 class="text-center text-3xl">Edit data user</h1>
    <form @submit.prevent="editSubmitForm()">
        <div class="p-4">
        <div class="mt-3">
            <label>Name: </label>
            <input type="text" v-model="user.name" class="border p-4">
        </div>
        <div class="mt-3">
            <label>Email: </label>
            <input type="text" v-model="user.email" class="border p-4">
        </div>
        <div class="mt-3">
            <label>Type: </label>
            <input type="text" v-model="user.type" class="border p-4">
        </div>
        <button type="submit" class="bg-green-500 p-4">Submit</button>
    </div>
    </form>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
    const user = ref([]);
    const route = useRoute();
    const id = route.params.id;
    const router = useRouter();

    onMounted(() => {
        userInfo();
    })
    const userInfo = async () => {
        try{
            let response = await axios.get('http://127.0.0.1:8000/api/users/' + id); 
            user.value = response.data;
        }catch(error){
            console.log(error)
        }
    }
    const editSubmitForm = async () => {
        try{
            await axios.put('http://127.0.0.1:8000/api/users/' + id, user.value)
            router.push({name: 'users-index'});
        }catch(error){
            console.log(error);
        }
    }
</script>

<style scoped>

</style>