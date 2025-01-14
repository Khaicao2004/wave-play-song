<template>
    <h1>Show data</h1>
</template>

<script setup>
import axios from 'axios';
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';

    const route = useRoute();
    const id = route.params.id;
    onMounted( async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/users/' + id);        
    })
    
</script>

<style scoped>

</style>