<template>
    <div
        class="flex flex-col justify-between rounded-md shadow-md p-2 hover:scale-105"
    >
        <div>
            <div>
                <img
                    class="rounded-md"
                    :src="product.media[0]?.original_url"
                    :alt="product.name"
                />
            </div>
            <div class="mt-3 pl-3 flex justify-between items-center">
                <p class="font-semibold text-lg">{{ product.name }}</p>
                <p class="text-stone-500 font-bold">{{ product.price }} DZD</p>
            </div>
            <div class="mt-5 pl-3">
                <h3 class="font-semibold">Description</h3>
                <p>
                    {{
                        product.description.length > 50
                            ? product.description.substring(0, 50) + "..."
                            : product.description
                    }}
                </p>
            </div>
        </div>
        <div>
            <div
                class="mt-10 flex justify-between items-center text-sm text-stone-400"
            >
                <p>{{ product.supplier.name }}</p>
                <p>{{ moment(product.created_at).fromNow() }}</p>
            </div>
            <div class="text-center mt-2">
                <a :href="`/products/${product.id}`">
                    <button
                        class="w-full bg-stone-300 font-semibold py-2 hover:bg-stone-500 hover:text-white"
                    >
                        More Details
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import moment from "moment";
const props = defineProps(["product"]);
</script>
