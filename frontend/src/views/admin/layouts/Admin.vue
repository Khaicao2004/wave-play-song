<template>
<div class="flex h-screen bg-white">
      <Sidebar/>
      <Content>
         <RouterView />
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