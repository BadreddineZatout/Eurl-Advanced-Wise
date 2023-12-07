<template>
    <div class="mt-6 pl-5">
        <h2 class="text-xl font-semibold">Categories:</h2>
        <ul class="ml-5 mt-2 list-disc">
            <li v-for="category in product.categories" :key="category.id">
                {{ category.name }}
            </li>
        </ul>
    </div>
    <div class="mt-10 pl-5">
        <h2 class="text-xl font-semibold mb-5">Description</h2>
        <p class="px-2">{{ product.description }}</p>
    </div>
    <div class="mt-10 flex justify-between items-center text-xl">
        <p>
            <span class="text-black font-bold">Supplier:</span>
            {{ product.supplier.name }}
        </p>
        <p>
            <span class="text-black font-bold">Added: </span
            >{{ moment(product.created_at).fromNow() }}
        </p>
    </div>
    <div class="text-center mt-2">
        <button
            class="w-full bg-stone-300 font-bold text-xl py-2 hover:bg-stone-500 hover:text-white"
            @click="handleOrder"
        >
            Order Now
        </button>
    </div>
</template>

<script setup>
const props = defineProps(["product"]);
</script>
