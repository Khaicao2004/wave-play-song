<template>
  <h1>Component {{ name }}</h1>
  <input
      type="text"
      v-model="inputValue"
      @input="updateName"
      placeholder="Nhập tên mới"
    />
</template>

<script setup>
import { ref } from 'vue';

const inputValue = ref('');
const props = defineProps({
  name: String,
});
const emit = defineEmits(['update-name']);
function updateName() {
  emit('update-name', inputValue.value); // Phát sự kiện kèm dữ liệu lên component cha
}

</script>
