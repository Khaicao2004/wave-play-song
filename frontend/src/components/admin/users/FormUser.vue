<template>
    <div class="p-4 bg-blue-200">
        <form @submit.prevent="submitForm">
            <div class="mt-3">
                <label>Name:</label>
                <!-- <input type="text" v-model=""> -->
            </div>
            <button type="submit" class="p-2 rounded bg-black text-white">Submit</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    name: String,
    email: String
})

// const form = ref({
//     name: props.name,
//     email: props.email,
// })
const emits = defineEmits([''])
console.log(props.name);

    const submitForm = async () => {

    }
</script>