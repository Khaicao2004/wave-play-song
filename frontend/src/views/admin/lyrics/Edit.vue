<template>
  <div class="p-4">
    <form @submit.prevent="submitForm" class="bg-blue-200 p-4">
        <div class="p-4">
            <div class="mt-3">
                <label>Language: </label>
                <input type="text" v-model="lyric.language">
            </div>
            <div class="mt-3">
                <label for="">Song</label>
                <select v-model="lyric.song_id" class="border">
                    <option v-for="song in songs" :value="song.id" :key="song.id">{{ song.name }}</option>
                </select>
            </div>
            <div class="mt-3">
                <label>Lyric: </label>
                <textarea v-model="lyric.lyrics"></textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="bg-black p-2 text-white rounded">Edit</button>
            </div>
        </div>
    </form>
  </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';

    const lyric = ref({
        language: '',
        lyrics: '',
        song_id: ''
    })
    const songs = ref([]);
    const route = useRoute();
    const id = route.params.id;
    onMounted(() => {
        fetchListSongs();
        fetchLyric();
    })

    const fetchListSongs = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/songs');
        songs.value = response.data;
    }
    const fetchLyric = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/lyrics/' + id);
        lyric.value = response.data;
        console.log(response.data);
        
    }

   const submitForm = async() => {

        await axios.put('http://127.0.0.1:8000/api/lyrics/' + id, lyric.value);
        fetchLyric();
   }

</script>