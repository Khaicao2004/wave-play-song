<template>
    <h1 class="text-center">test vue</h1>
    {{ songs.name }}
    <Test :name="songs.name" @update-name="handleUpdateName"/>
</template>

<script setup>
import Test from '@/components/Test.vue';
import { ref } from 'vue';

    const songs = ref({
        name: 'Khaicao'
    })
    const handleUpdateName = (newName) => {
        songs.value.name = newName; // Cập nhật dữ liệu
    }
</script>

