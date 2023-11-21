<template>
    <div class="mt-20 px-20">
        <h1 class="text-3xl font-bold">Latest Products</h1>
        <div class="grid grid-cols-4 gap-5 pt-5 px-5">
            <ProductCard v-for="product in products" :key="product.id" :product="product" />
        </div>
        <div v-if="show_more" class="text-center mt-10">
            <button class="bg-stone-300 font-semibold py-2 px-3 rounded-lg hover:bg-stone-400 hover:text-white"
                @click="loadMore">Load More
                ...</button>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { getProducts } from "../../utils/products"
import ProductCard from './ProductCard.vue';

let products = ref({});
let show_more = ref(true)
let offset = ref(0);
let limit = ref(4);

onMounted(async () => {
    products.value = await getProducts(offset.value);
})

const loadMore = async () => {
    offset.value++;
    let new_products = await getProducts(offset.value);
    products.value = [...products.value, ...new_products];
    if (new_products.length < limit.value) show_more.value = false;
}
</script>