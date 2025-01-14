<template>
<div class="p-4">
    <Header />
    <RouterView />
    <Footer />
</div>
</template>

<script setup>
    import { RouterView } from 'vue-router'
    import Header from '@/components/admin/Header.vue';
    import Footer from '@/components/admin/Footer.vue';

</script>

<style>

</style>