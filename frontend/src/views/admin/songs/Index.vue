<template>
    <h1 class="text-3xl text-center mt-5 font-semibold">List songs</h1>
    <div class="p-4">
    <div class="mb-5">
        <RouterLink :to="{name: 'songs-create'}" class="p-4 bg-blue-200">Create</RouterLink>
    </div>
    <table class="border-x-neutral-950 border-spacing-2  w-full text-center overflow-auto">
        <thead>
            <tr>
                <th class="border">ID</th>
                <th class="border">Name</th>
                <th class="border">Cover image</th>
                <th class="border">Duration</th>
                <th class="border">Release date</th>
                <th class="border">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="song in songs" :key="song.id">
            <td class="border">{{ song.id }}</td>
            <td class="border">{{ song.name }}</td>
            
            <td class="border">
                <img :src="`http://127.0.0.1:8000/storage/${song.cover_image}`" alt="song Avatar" class="w-10 h-10" v-if="song.cover_image">
                <span v-else>No Image</span>
            </td>
            <td class="border">{{ song.duration }}</td>
            <td class="border">{{ song.release_date }}</td>
            <td class="border">
               <div class="flex justify-center gap-2 p-2">
                    <RouterLink :to="{ name: 'songs-show', params: { id: song.id} }" class="bg-blue-500 p-4 w-20 h-auto rounded">Show</RouterLink>
                    <RouterLink :to="{ name: 'songs-edit', params: { id: song.id} }" class="bg-yellow-500 p-4 w-20 h-auto rounded">Edit</RouterLink>
                    <button type="button" class="bg-red-500 p-4 w-20 h-auto rounded" @click="deleteSong(song.id)">Delete</button>
               </div>
            </td>
        </tr>
    </tbody>
    </table>
   </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref  } from 'vue';


    const songs = ref([]);

    onMounted(() => {
        fecthListSongs();
    })

    const fecthListSongs = async () => {
       try {
            let response = await axios.get('http://127.0.0.1:8000/api/songs');
            songs.value = response.data;
       } catch (error) {
            console.log(error);
       }
    }
    
    const deleteSong = (id) => {
        try {
            axios.delete('http://127.0.0.1:8000/api/songs/' + id);
            songs.value = songs.value.filter(songs => songs.id != id);
        } catch (error) {
            console.log(error);       
        }
    }
</script>