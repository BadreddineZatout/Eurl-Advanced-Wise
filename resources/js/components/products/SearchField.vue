<template>
    <div class="w-full text-center">
        <input
            class="w-full md:w-1/2 py-3 px-3 rounded-lg border border-stone-700 focus:outline-none focus:ring-2 focus:ring-stone-700"
            type="text"
            placeholder="Search for your product..."
            v-model="search"
            @change="handleChange"
        />
    </div>
</template>

<script setup>
import { ref } from "vue";

const search = ref("");

const emit = defineEmits(["searchProduct"]);

const handleChange = () => {
    emit("searchProduct", search.value);
};
</script>
