<template>
    <div class="mt-20 px-20">
        <h1 class="text-3xl font-bold">Latest Products</h1>
        <div class="grid grid-cols-4 gap-5 pt-5 px-5">
            <ProductCard v-for="product in products" :key="product.id" :product="product" />
        </div>
    </div>
</template>

<script setup>
    import {onMounted, ref} from 'vue'
    import {getProducts} from "../utils/products"
    import ProductCard from './ProductCard.vue';
    
    let products = ref({});
    onMounted(async () => {
        products.value = await getProducts();
    })
</script>