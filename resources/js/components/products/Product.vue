<template>
    <div class="mt-20 px-20 flex justify-between items-stretch gap-x-5 w-full">
        <div class="w-1/2 border border-stone-400 bg-stone-100 rounded-lg p-2 relative">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">{{ product.name }}</h1>
                <h1 v-show="isOnDetails" class="text-3xl font-bold">{{ product.price }} DZD</h1>
            </div>
            <div v-show="isOnDetails">
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
                    <button class="w-full bg-stone-300 font-bold text-xl py-2 hover:bg-stone-500 hover:text-white"
                        @click="handleOrder">
                        Order Now
                    </button>
                </div>
            </div>
            <div v-show="isOnOrder">
                <form>
                    <div class=" grid mt-10 mb-5">
                        <label class="font-semibold mb-2" for="quantity">Quantity :</label>
                        <input class="rounded-md border border-gray-500 bg-inherit px-3 py-2" id="quantity" name="quantity"
                            type="number" min="1" v-model="quantity" required>
                    </div>
                    <div class="grid pl-5">
                        <div class="font-semibold">
                            <span class="text-xl font-bold">Unit Price:</span> {{ product.price }} DA
                        </div>
                        <div class="font-semibold">
                            <span class="text-xl font-bold">Order Total:</span> {{ orderTotal }} DA
                        </div>
                    </div>
                    <div class="text-center mt-2 flex justify-between items-center gap-x-2 absolute bottom-2 w-full pr-4">
                        <button class="w-1/2 bg-stone-300 font-bold text-xl py-2 hover:bg-stone-500 hover:text-white"
                            @click="handleOrderConfirm">
                            Confirm Order
                        </button>
                        <button class="w-1/2 bg-stone-300 font-bold text-xl py-2 hover:bg-stone-500 hover:text-white"
                            @click="handleReturn">
                            Return to details
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/2">
            <img class="rounded-md" :src="product.media[0]?.original_url" :alt="product.name" />
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import moment from "moment";
import { useUserStore } from "../../stores/user";
import { saveOrder } from "../../utils/products";

const props = defineProps(["product"]);
const userStore = useUserStore();
const isOnDetails = ref(true);
const isOnOrder = ref(false);
const quantity = ref(1);

const orderTotal = computed(() => props.product.price * quantity.value)

const handleOrder = () => {
    if (!userStore.isLogged) {
        window.location.href = "/login";
        return;
    }
    isOnDetails.value = false
    isOnOrder.value = true
}

const handleReturn = (event) => {
    event.preventDefault();
    quantity.value = 1;
    isOnOrder.value = false;
    isOnDetails.value = true;
}

const handleOrderConfirm = async (event) => {
    event.preventDefault()
    const data = {
        product_id: props.product.id,
        quantity: quantity.value,
        total: orderTotal.value
    }
    await saveOrder(data)
    window.location.href = "/orders"
}
</script>
