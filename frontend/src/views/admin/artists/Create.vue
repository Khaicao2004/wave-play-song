<template>
    <h1 class="text-center text-3xl">Create</h1>
    <div class="p-4">
        <form @submit.prevent="submitForm" class="bg-blue-200 p-4">
            <div class="mt-3">
                <label>Name:</label>
                <input type="text" v-model="artist.name" class="border">
            </div>
            <div class="mt-3">
                <label>Cover image:</label>
                <input type="file" @change="uploadFile">
            </div>
            <div class="mt-3">
                <label>Bio:</label>
                <textarea v-model="artist.bio" class="border"></textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="bg-blue-500 p-2 rounded">Create</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';
    const router = useRouter();
    const artist = ref({
        name: '',
        cover_image: null,
        bio: '',
    });
    const uploadFile = (event) => {
       const file = event.target.files[0];
       artist.value.cover_image = file;
    }
    const submitForm = async() => {
        const formData = new FormData();
        formData.append('name', artist.value.name);
        formData.append('cover_image', artist.value.cover_image);
        formData.append('bio', artist.value.bio);
        await axios.post('http://127.0.0.1:8000/api/artists', formData);
        artist.value.name = '';
        artist.value.cover_image = '';
        artist.value.bio = '';
        router.push({ name: 'artists-index' });
    }
</script>