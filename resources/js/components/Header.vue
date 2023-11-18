<template>
    <div class="w-full flex justify-between items-center px-5 py-3 shadow-md">
        <div>
            <h1 class="text-2xl font-bold">
                <a href="/">Eurl Advanced & Wise</a></h1>
        </div>
        <div class="flex justify-between items-center gap-x-5">
            <a class="hover:font-semibold" :class="{active: isRegisterPage}" href="/register">Register</a>
            <a class="hover:font-semibold" :class="{active: isLoginPage}" href="login">Login</a>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

    const isRegisterPage = ref(window.location.pathname=='/register')
    const isLoginPage = ref(window.location.pathname=='/login')
</script>

<style scoped>
.active{
    @apply font-bold
}
</style>