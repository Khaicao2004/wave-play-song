<template>
    <h1 class="text-center text-3xl mt-5">List lyrics</h1>
    <div class="p-4">
            <table class="w-full text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Song name</th>
                        <th>Language</th>
                        <th>Lyrics</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="lyric in lyrics" :key="lyric.id">
                        <td>{{ lyric.id }}</td>
                        <td>{{ lyric.song.name }}</td>
                        <td>{{ lyric.language }}</td>
                        <td>{{ lyric.lyrics }}</td>
                    </tr>
                </tbody>
            </table>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

    const lyrics = ref([]);
    onMounted(() => {
        fetchListLyrics();
    })
    const fetchListLyrics = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/lyrics');
        lyrics.value = response.data;
        
    }
</script>