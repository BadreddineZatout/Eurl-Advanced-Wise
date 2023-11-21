<template>
    <div class="w-full flex justify-between items-center px-5 py-3 shadow-md bg-stone-200">
        <div>
            <h1 class="text-2xl font-bold">
                <a href="/">Eurl Advanced & Wise</a>
            </h1>
        </div>
        <div v-if="!userStore.isLogged" class="flex justify-between items-center gap-x-5 font-semibold">
            <a class="hover:font-bold hover:text-stone-700" :class="{ active: isRegisterPage }"
                href="/register">Register</a>
            <a class="hover:font-bold hover:text-stone-700" :class="{ active: isLoginPage }" href="login">Login</a>
        </div>
        <div v-if="userStore.isLogged" class="flex justify-between items-center gap-x-5 font-semibold">
            <button class="hover:font-bold hover:text-stone-700" @click="handleLogout">
                Logout
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { logout } from "../utils/auth";
import { useUserStore } from "../stores/user";

const isRegisterPage = ref(window.location.pathname == "/register");
const isLoginPage = ref(window.location.pathname == "/login");

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
