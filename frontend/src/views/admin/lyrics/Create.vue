<template>
    <form @submit.prevent="submitForm">
        <div class="p-4">
            <div class="mt-3">
                <label for="">Song</label>
                <select v-model="selectOption" class="w-full">
                    <option v-for="song in songs" :value="song.id" :key="song.id">{{ song.name }}</option>
                </select>
            </div>
            <div class="mt-3">
                <button type="submit">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
    const selectOption = ref(null);

    const songs = ref([]);

    onMounted(() => {
        fetchListSongs();
    })

    const fetchListSongs = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/songs');
        songs.value = response.data;
    }

   const submitForm = async() => {

        await axios.post('http://127.0.0.1:8000/api/songs', selectOption);
   }

</script>