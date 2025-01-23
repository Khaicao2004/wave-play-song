<template>
    <h1 class="text-center text-3xl">Create</h1>
    <div class="p-4">
        <form @submit.prevent="submitForm" class="p-4 bg-blue-200">
            <div class="mt-3">
                <label>Name:</label>
                <input type="text" v-model="songs.name">
            </div>
            <div class="mt-3">
                <label>Cover image:</label>
                <input type="file" @change="uploadImage">
            </div>
            <div class="mt-3">
                <label>Audio file:</label>
                <input type="file" @change="uploadAudio">
            </div>
            <div class="mt-3">
                <label>Duration:</label>
                <input type="time" v-model="songs.duration">
            </div>
            <div class="mt-3">
                <label>Release date:</label>
                <input type="date" v-model="songs.release_date">
            </div>
            <div class="mt-3">
                <button type="submit" class="p-2 bg-black text-white rounded">Create</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

    const songs = ref({
        name: '',
        cover_image: '',
        audio_file: '',
        duration: '',
        release_date: '',
    })
    const uploadImage = (event) => {
        songs.value.cover_image = event.target.files[0];
        
    }
    const uploadAudio = (event) => {
        songs.value.audio_file = event.target.files[0];   
    }
    const submitForm = async () => {
        await axios.post('http://127.0.0.1:8000/api/songs', songs.value);
    }
</script>