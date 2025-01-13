<template>
    <div class="p-4">
        <h1 class="text-center">vuejs</h1>

        <RouterLink :to="{ name: 'users-create' }" class="btn btn-primary mb-3">Create</RouterLink>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users">
                    <td>{{ index + 1 }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import instandAxios from '@/utils/configAxios';
import { onMounted, ref } from 'vue';
import { RouterLink } from 'vue-router';

const users = ref([]);

onMounted(async () => {
    try {
        let response = await instandAxios.get('users');
        users.value = response.data
        console.log(users.value);
    } catch (error) {
        console.log('call api error')
    }

})
const deleteUser = (async (userId) => {
    
})
</script>