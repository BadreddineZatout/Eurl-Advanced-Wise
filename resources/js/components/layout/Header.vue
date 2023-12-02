<template>
    <div class="w-full h-16 flex justify-between items-center px-5 py-3 shadow-md bg-stone-300 text-lg overflow-hidden">
        <div>
            <h1 class="text-2xl font-bold">
                <a href="/"><img class="h-20" src="/images/logo.png" alt="Eurl Advanced & Wise"></a>
            </h1>
        </div>
        <div v-if="!userStore.isLogged" class="flex justify-between items-center gap-x-5 font-semibold">
            <a class="hover:font-bold hover:text-stone-700" :class="{ active: isRegisterPage }"
                href="/register">Register</a>
            <a class="hover:font-bold hover:text-stone-700" :class="{ active: isLoginPage }" href="/login">Login</a>
        </div>
        <div v-if="userStore.isLogged" class="flex justify-between items-center gap-x-5 font-semibold">
            <a class="hover:font-bold hover:text-stone-700" :class="{ active: isOrdersPage }" href="/orders">Orders</a>
            <button class="hover:font-bold hover:text-stone-700" @click="handleLogout">
                Logout
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { logout } from "../../utils/auth";
import { useUserStore } from "../../stores/user";

const isRegisterPage = ref(window.location.pathname == "/register");
const isLoginPage = ref(window.location.pathname == "/login");
const isOrdersPage = ref(window.location.pathname == "/orders");

const userStore = useUserStore();

const handleLogout = async () => {
    await logout();
    userStore.$reset();
    window.location.reload();
};
</script>

<style scoped>
.active {
    @apply font-bold;
}
</style>
