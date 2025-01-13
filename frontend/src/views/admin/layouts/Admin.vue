<template>
    <h1>Layout</h1>
<Header />
<RouterView />
<Footer />
</template>

<script setup>
    import { RouterView } from 'vue-router'
    import Header from '@/components/admin/Header.vue';
    import Footer from '@/components/admin/Footer.vue';

</script>

<style>

</style>