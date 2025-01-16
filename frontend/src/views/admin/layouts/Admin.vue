<template>
<div class="flex h-screen bg-blue-100">
      <Sidebar/>
      <Content>
        <h1 class="text-center">helloo</h1>
      </Content>
    
   </div>
</template>

<script setup>
    import { RouterView } from 'vue-router'
    import Sidebar from '@/components/admin/Sidebar.vue';
    import Content from '@/components/admin/Content.vue';

</script>

<style>

</style>