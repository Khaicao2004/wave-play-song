<template>
      <aside class="bg-gray-400 text-white flex flex-col w-64 md:w-72 lg:w-80">
        <div class="p-4">Logo</div>
        <nav class="flex-1">
           <ul class="p-4 space-y-2">
                <li class="bg-black px-4 py-2 hover:bg-gray-500 rounded">
                    <RouterLink :to="{name: 'users-index'}" class="px-4">User</RouterLink>
                </li>
                <li class="bg-black px-4 py-2 hover:bg-gray-500 rounded">
                    <RouterLink :to="{name: 'categories-index'}" class="px-4">Categories</RouterLink>
                </li>
                <li class="bg-black px-4 py-2 hover:bg-gray-500 rounded">
                    <RouterLink :to="{name: 'songs-index'}" class="px-4">Songs</RouterLink>
                </li>
                <li class="bg-black px-4 py-2 hover:bg-gray-500 rounded">
                    <RouterLink :to="{name: 'lyrics-index'}" class="px-4">Lyrics</RouterLink>
                </li>
           </ul>
        </nav>
       </aside>
</template>

<script setup>
import { RouterLink } from 'vue-router';

    
</script>