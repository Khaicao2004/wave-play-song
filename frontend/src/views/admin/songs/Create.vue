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
                <label>Artists: </label>
                <select v-model="artist_id">
                    <option v-for="artist in artists" :value="artist.id">{{ artist.name }}</option>
                </select>
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
import { onMounted, ref } from 'vue';

    const songs = ref({
        name: '',
        cover_image: '',
        audio_file: '',
        duration: '',
        release_date: '',
    })
    const artist_id = ref('');
    const artists = ref([]);
    const uploadImage = (event) => {
        songs.value.cover_image = event.target.files[0];
        
    }
    const uploadAudio = (event) => {
        songs.value.audio_file = event.target.files[0];   
    }
    const fetchArtists = async() => {
        let response = await axios.get('http://127.0.0.1:8000/api/artists');
        artists.value = response.data;
    }
    onMounted(() => {
        fetchArtists();
    })
    const submitForm = async () => {
        try {
            const formData = new FormData();
            formData.append('name', songs.value.name);
            formData.append('cover_image', songs.value.cover_image);
            formData.append('audio_file', songs.value.audio_file);
            formData.append('duration', songs.value.duration);
            formData.append('release_date', songs.value.release_date);
            formData.append('artist_id', artist_id.value);
            
            
            await axios.post('http://127.0.0.1:8000/api/songs', formData);
            songs.value.name = '';
            songs.value.cover_image = '';
            songs.value.audio_file = '';
            songs.value.duration = '';
            songs.value.release_date = '';
            artist_id.value = '';
        } catch (error) {
            console.log(error);
        }
    }
</script>