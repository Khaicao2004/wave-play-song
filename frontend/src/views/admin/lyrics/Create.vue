<template>
    <form @submit.prevent="submitForm" class="bg-blue-200 p-4">
        <div class="p-4">
            <div class="mt-3">
                <label>Language: </label>
                <input type="text" v-model="lyricsData.language">
            </div>
            <div class="mt-3">
                <label for="">Song</label>
                <select v-model="lyricsData.song_id" class="border">
                    <option v-for="song in songs" :value="song.id" :key="song.id">{{ song.name }}</option>
                </select>
            </div>
            <div class="mt-3">
                <label>Lyrics: </label>
                <textarea v-model="lyricsData.lyrics"></textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="bg-black p-2 text-white rounded">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
    const lyricsData = ref({
        language: '',
        lyrics: '',
        song_id: ''
    })
    const songs = ref([]);

    onMounted(() => {
        fetchListSongs();
    })

    const fetchListSongs = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/songs');
        songs.value = response.data;
    }

   const submitForm = async() => {

        await axios.post('http://127.0.0.1:8000/api/lyrics', lyricsData.value);
        lyricsData.value.language = '';
        lyricsData.value.song_id = '';
        lyricsData.value.lyrics = '';
   }

</script>