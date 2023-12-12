<template>
    <div
        class="w-full border border-stone-300 bg-stone-200 my-5 flex justify-around items-center gap-x-5 md:gap-x-0 px-5 md:px-0 py-5 rounded-lg">
        <div class="w-1/2 md:w-1/3 flex items-center gap-x-2*">
            <select class="w-full bg-stone-100 px-5 py-3 rounded-lg" name="suppliers" v-model="supplier"
                @change="handleSupplierFilter">
                <option value="" disabled selected>Select Supplier ...</option>
                <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">
                    {{ supplier.name }}
                </option>
            </select>
            <button v-show="supplier" @click="clearSupplier"
                class="text-xl font-semibold hover:font-bold hover:text-stone-600">
                X
            </button>
        </div>
        <div class="w-1/2 md:w-1/3 flex items-center gap-x-2">
            <select class="w-full bg-stone-100 px-5 py-3 rounded-lg" name="categories" v-model="category"
                @change="handleCategoryFilter">
                <option value="" disabled selected>Select Category ...</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
            <button v-show="category" @click="clearCategory"
                class="text-xl font-semibold hover:font-bold hover:text-stone-600">
                X
            </button>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { getCategories, getSuppliers } from "../../utils/products";

const emit = defineEmits(["filterCategory", "filterSupplier"]);

const categories = ref([]);
const category = ref("");
const suppliers = ref([]);
const supplier = ref("");

onMounted(async () => {
    categories.value = await getCategories();
    suppliers.value = await getSuppliers();
});

const handleCategoryFilter = () => {
    emit("filterCategory", category.value);
};

const handleSupplierFilter = () => {
    emit("filterSupplier", supplier.value);
};

const clearCategory = () => {
    category.value = "";
    emit("filterCategory", category.value);
};

const clearSupplier = () => {
    supplier.value = "";
    emit("filterSupplier", supplier.value);
};
</script>
