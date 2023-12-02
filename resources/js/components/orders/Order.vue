<template>
    <div class="mt-20 px-20 flex justify-between items-stretch gap-x-5 w-full">
        <div class="w-1/2 border border-stone-400 bg-stone-100 rounded-lg p-2 relative">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">#{{ order.id }}</h1>
                <h1 class="text-lg font-bold px-3 py-1 rounded-md border" :class="getStatusStyle()">{{ order.status }}</h1>
            </div>
            <div class="border border-stone-200 p-5 mt-10">
                <ul class="list-disc pl-5 text-xl font-bold">
                    <li>Product: <span class="font-semibold">{{ order.product.name }}</span></li>
                    <li>Supplier: <span class="font-semibold">{{ order.product.supplier.name
                    }}</span></li>
                    <li>Quantity: <span class="font-semibold">{{ order.quantity }}</span></li>
                    <li>Total: <span class="font-semibold">{{ order.total }} DA</span></li>
                </ul>
            </div>

            <div v-if="canCancel" class="text-center mt-2 absolute w-11/12 left-7 bottom-2">
                <button class="w-full bg-stone-300 font-bold text-xl py-2 hover:bg-stone-500 hover:text-white"
                    @click="handleCancelOrder">
                    Cancel Order
                </button>
            </div>
        </div>
        <div class="w-1/2">
            <img class="rounded-md" :src="order.product.media[0]?.original_url" :alt="order.product.name" />
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { cancelOrder } from "../../utils/orders"

const props = defineProps(["order"]);
const getStatusStyle = () => {
    if (props.order.status == "pending") return 'text-stone-700 bg-stone-200 border-stone-500';
    if (props.order.status == "accepted") return 'text-green-500 bg-green-100 border-green-500';
    if (props.order.status == "completed") return 'text-yellow-500 bg-yellow-100 border-yellow-500';
    return 'text-red-500 bg-red-100 border-red-500';
}

const canCancel = ref(props.order.status == 'pending' || props.order.status == 'accepted');

const handleCancelOrder = async (event) => {
    event.preventDefault()
    await cancelOrder(props.order.id)
    window.location.href = "/orders"
}
</script>
