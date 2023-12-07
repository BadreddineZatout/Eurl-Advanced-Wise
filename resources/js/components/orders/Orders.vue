<template>
    <div class="mt-20 mb-10 px-20">
        <h1 class="text-3xl font-bold">My Orders</h1>
        <div v-show="is_loading" class="w-full text-center mt-20">
            <PulseLoader :loading="is_loading" color="rgb(120, 113, 108)" size="50px" />
        </div>
        <div v-show="no_orders" class="w-full text-center mt-20">
            <h1 class="text-3xl font-bold">No Orders Yet!!!</h1>
        </div>
        <div v-show="!is_loading" class="grid gap-y-5 px-20 mt-10">
            <div v-for="order in orders" :key="order.id"
                class="flex justify-between items-center rounded-lg shadow-lg border border-stone-200 px-5 py-3 hover:scale-110">
                <div class="font-semibold grid grid-cols-2 gap-x-3 w-1/2">
                    <div class="col-span-1 rounded-lg overflow-hidden">
                        <img :src="order.product.media[0]?.original_url" alt="">
                    </div>
                    <div class="col-span-1 font-bold">
                        <h2 class="text-2xl text-stone-600 font-bold">#{{ order.id }} - {{ order.product.name }}</h2>
                        <h3 class="order-details">quantity: <span class="font-semibold">{{ order.quantity }}</span></h3>
                        <h3 class="order-details">Total: <span class="font-semibold">{{ order.total }} DA</span></h3>
                        <h3 class="order-details">status: <span class="text-sm px-3 py-1 rounded-md border font-semibold"
                                :class="getStatusStyle(order)">{{
                                    order.status }}</span></h3>
                    </div>
                </div>
                <div class="text-stone-500">
                    <a :href="`/orders/${order.id}`" class="font-semibold text-lg hover:underline hover:font-bold">Check
                        Details</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import { getOrders } from "../../utils/orders";

const props = defineProps(["orders"])
let orders = ref({});
let is_loading = ref(false);
let no_orders = ref(false);

const getStatusStyle = (order) => {
    if (order.status == "pending") return 'text-stone-700 bg-stone-200 border-stone-500';
    if (order.status == "accepted") return 'text-green-500 bg-green-100 border-green-500';
    if (order.status == "completed") return 'text-yellow-500 bg-yellow-100 border-yellow-500';
    return 'text-red-500 bg-red-100 border-red-500';
}

onMounted(async () => {
    await loadData();
})

const loadData = async () => {
    is_loading.value = true;
    orders.value = await getOrders();
    is_loading.value = false;

    if (!orders.value.length) no_orders.value = true;
}
</script>

<style scoped>
.order-details {
    @apply text-lg ml-3 mt-2;
}
</style>