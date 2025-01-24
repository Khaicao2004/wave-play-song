<template>
    <h1 class="text-center text-3xl mt-5">Edit</h1>
    <div class="p-4">
        <form @submit.prevent="submitForm" class="p-4 bg-blue-200">
            <div class="mt-3">
                <label>Name:</label>
                <input type="text" v-model="song.name">
            </div>
            <div class="mt-3">
                <label>Cover image:</label>
                <input type="file" @change="uploadImage">
                <img :src="`${STORAGE_URL}${song.cover_image}`" alt="" class="w-30 h-20 mt-3">
            </div>
            
            <div class="mt-3">
                <label>Audio file:</label>
                <input type="file" @change="uploadAudio">
                <audio preload="auto" controls class="mt-3">
                    <source :src="`${STORAGE_URL}${song.audio_file}`">
                </audio>
            </div>
            <div class="mt-3">
                <label>Duration:</label>
                <input type="time" v-model="song.duration">
            </div>
            <div class="mt-3">
                <label>Release date:</label>
                <input type="date" v-model="song.release_date">
            </div>
            <div class="mt-3">
                <button type="submit" class="p-2 bg-black text-white rounded">Edit</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import STORAGE_URL from '@/utils/configStorageUrl';
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';

    const song = ref({
        name: '',
        cover_image: '',
        audio_file: '',
        duration: '',
        release_date: '',
    })

    const route = useRoute();
    const id = route.params.id;
    
    const uploadImage = (event) => {
        song.value.cover_image = event.target.files[0];
        
    }
    const uploadAudio = (event) => {
        song.value.audio_file = event.target.files[0];   
    }
    onMounted(() => {
        fetchSong();
    })
    const fetchSong = async () => {
        let response  = await axios.get('http://127.0.0.1:8000/api/songs/' + id);
        song.value = response.data;
    }
    const submitForm = async () => {
        try {
            const formData = new FormData();
            formData.append('name', song.value.name);
            formData.append('cover_image', song.value.cover_image);
            formData.append('audio_file', song.value.audio_file);
            formData.append('duration', song.value.duration);
            formData.append('release_date', song.value.release_date);
            
            
            await axios.post('http://127.0.0.1:8000/api/songs', formData);
            song.value.name = '';
            song.value.cover_image = '';
            song.value.audio_file = '';
            song.value.duration = '';
            song.value.release_date = '';
        } catch (error) {
            console.log(error);
        }
    }
</script>