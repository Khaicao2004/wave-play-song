<template>
    <h1 class="text-center text-3xl">Edit data user</h1>
    <form @submit.prevent="editSubmitForm">
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
        <div class="mt-3">
            <label>Avatar: </label>
            <input type="file" @change="uploadFile">
        </div>
        <div class="mt-3 mb-3">
            <img :src="previewImage || `http://127.0.0.1:8000/storage/${user.avatar}`" alt="" class="w-20 h-20">
        </div>
        <button type="submit" class="bg-green-500 p-4">Submit</button>
    </div>
    </form>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
    const user = ref({
        name: '',
        email: '',
        type: '',
        avatar: '',
    });
    const route = useRoute();
    const id = route.params.id;
    const router = useRouter();
    const previewImage = ref(null);
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
    const uploadFile = (event) => {
        const file = event.target.files[0];
        // user.value.avatar = file;   
        if (file) {
        const reader = new FileReader();
        console.log(reader)
        reader.onloadend = () => {
            previewImage.value = reader.result; // Gán ảnh preview vào previewImage
        };
        reader.readAsDataURL(file);
        // Lưu avatar vào user để gửi kèm theo khi submit form (nếu cần)
        user.value.avatar = file;
    }
    }
    const editSubmitForm = async () => {
        try{
            const formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('name', user.value.name);
            formData.append('email', user.value.email);
            formData.append('avatar', user.value.avatar);
            formData.append('type', user.value.type);
            await axios.post('http://127.0.0.1:8000/api/users/' + id, formData)
            router.push({name: 'users-index'});
        }catch(error){
            console.log(error);
        }
    }
</script>

<style scoped>

</style>