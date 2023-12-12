<template>
    <div class="mt-20 mb-10 px-10 md:px-20">
        <SearchField @search-product="handleSearch" />
        <Filters
            @filter-category="handleCategoryFilter"
            @filter-supplier="handleSupplierFilter"
        />
        <h1
            v-if="!filter.search && !filter.category && !filter.supplier"
            class="text-2xl md:text-3xl font-bold"
        >
            Latest Products
        </h1>
        <h1 v-else class="text-3xl font-bold">Search Results</h1>
        <div v-show="is_loading" class="w-full text-center mt-20">
            <PulseLoader
                :loading="is_loading"
                color="rgb(120, 113, 108)"
                size="50px"
            />
        </div>
        <div v-show="no_products" class="w-full text-center mt-20">
            <h1 class="text-3xl font-bold">No Products Yet!!!</h1>
        </div>
        <div v-show="!is_loading">
            <div
                id="products"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pt-5 px-5"
            >
                <ProductCard
                    v-for="product in products"
                    :key="product.id"
                    :product="product"
                />
            </div>
            <div v-if="!no_products && show_more" class="text-center mt-10">
                <button
                    class="flex justify-between items-center gap-x-2 mx-auto bg-stone-300 font-semibold py-2 px-3 rounded-lg hover:bg-stone-400 hover:text-white"
                    @click="loadMore"
                >
                    <ClipLoader
                        :loading="is_loading_more"
                        color="rgb(120, 113, 108)"
                    />
                    Load More...
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import ClipLoader from "vue-spinner/src/ClipLoader.vue";
import ProductCard from "./ProductCard.vue";
import SearchField from "./SearchField.vue";
import Filters from "./Filters.vue";
import { getProducts } from "../../utils/products";

let products = ref({});
let is_loading = ref(false);
let is_loading_more = ref(false);
let no_products = ref(false);
let show_more = ref(false);
let filter = reactive({ search: "", category: "", supplier: "" });
let offset = ref(0);
let limit = ref(4);

onMounted(async () => {
    await loadData();
});

const loadMore = async () => {
    is_loading_more.value = true;
    offset.value++;
    let new_products = await getProducts({ offset: offset.value, ...filter });
    products.value = [...products.value, ...new_products];
    is_loading_more.value = false;
    if (new_products.length < limit.value) show_more.value = false;
};

const handleSearch = async (search) => {
    offset.value = 0;
    filter.search = search;
    await loadData();
};

const handleCategoryFilter = async (category) => {
    offset.value = 0;
    filter.category = category;
    await loadData();
};

const handleSupplierFilter = async (supplier) => {
    offset.value = 0;
    filter.supplier = supplier;
    await loadData();
};

const loadData = async () => {
    show_more.value = true;
    is_loading.value = true;
    products.value = await getProducts({ ...filter });
    is_loading.value = false;

    if (!products.value.length) no_products.value = true;
    if (products.value.length < limit.value) show_more.value = false;
};
</script>
