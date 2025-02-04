<template>
    <h1 class="mt-5 text-center text-3xl">List artists</h1>
    <div class="p-4">
        <RouterLink :to="{ name: 'artists-create'}" class="p-2 rounded bg-blue-500">Create</RouterLink>
        <table class="w-full text-center border mt-5">
            <thead>
                <tr>
                    <th class="border">ID</th>
                    <th class="border">Name</th>
                    <th class="border">Cover image</th>
                    <th class="border">Bio</th>
                    <th class="border">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="artist in artists" :key="artist.id">
                    <td class="border">{{ artist.id }}</td>
                    <td class="border">{{ artist.name }}</td>
                    <td class="border p-2">
                        <div class="flex justify-center">
                            <img :src="`${STORAGE_URL}${artist.cover_image}`" alt="" class="w-10 h-10">
                        </div>
                    </td>
                    <td class="border">{{ artist.bio }}</td>
                    <td class="border"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import axios from 'axios';
import STORAGE_URL from '@/utils/configStorageUrl';
import { onMounted, ref } from 'vue';
import { RouterLink } from 'vue-router';

    const artists = ref([]);
    onMounted(() => {
        fetchArtists();
    })
    
    const fetchArtists = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/artists');
        artists.value = response.data;  
    }
</script>