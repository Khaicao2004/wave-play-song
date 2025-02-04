<template>
    <h1 class="text-center text-3xl mt-5">List lyrics</h1>
    <div class="p-4">
        <RouterLink :to="{ name: 'lyrics-create'}" class="p-2 bg-black text-white">Create</RouterLink>
            <table class="w-full text-center mt-4 border">
                <thead>
                    <tr>
                        <th class="border">ID</th>
                        <th class="border">Song name</th>
                        <th class="border">Language</th>
                        <th class="border">Lyrics</th>
                        <th class="border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="lyric in lyrics" :key="lyric.id">
                        <td class="border">{{ lyric.id }}</td>
                        <td class="border">{{ lyric.song.name }}</td>
                        <td class="border">{{ lyric.language }}</td>
                        <td class="border">{{ lyric.lyrics }}</td>
                        <td class="border p-2">
                            <div class="flex justify-center">
                                <RouterLink :to="{ name: 'lyrics-edit', params: { id: lyric.id } }" class="p-2 bg-blue-500 rounded">Edit</RouterLink>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { RouterLink } from 'vue-router';

    const lyrics = ref([]);
    onMounted(() => {
        fetchListLyrics();
    })
    const fetchListLyrics = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/lyrics');
        lyrics.value = response.data;
        
    }
</script>