<template>
    <h1 class="text-center">test vue</h1>
    {{ songs.name }}
    <Test :name="songs.name" @update-name="handleUpdateName"/>
    <FormUser :name="users.name" :email="users.email"/>
</template>

<script setup>
import FormUser from '@/components/admin/users/FormUser.vue';
import Test from '@/components/Test.vue';

import { ref } from 'vue';
    const users = ref({
        name: 'khaicao',
        email: 'khaicao@gmail.com'
    })
    const songs = ref({
        name: 'Khaicao'
    })
    const handleUpdateName = (newName) => {
        songs.value.name = newName; // Cập nhật dữ liệu
    }
</script>

