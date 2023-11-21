<template>
    <div class="mt-20 px-20 flex justify-between items-stretch gap-x-5 w-full">
        <div class="w-1/2 border border-stone-400 bg-stone-100 rounded-lg p-2">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">{{ product.name }}</h1>
                <h1 class="text-3xl font-bold">{{ product.price }} DZD</h1>
            </div>
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
                    <span class="text-black font-bold">Added: </span>{{ moment(product.created_at).fromNow() }}
                </p>
            </div>
            <div class="text-center mt-2">
                <button class="w-full bg-stone-300 font-bold text-xl py-2 hover:bg-stone-500 hover:text-white">
                    Order Now
                </button>
            </div>
        </div>
        <div class="w-1/2">
            <img class="rounded-md" :src="product.media[0]?.original_url" :alt="product.name" />
        </div>
    </div>
</template>

<script setup>
import moment from "moment";
const props = defineProps(["product"]);
</script>
