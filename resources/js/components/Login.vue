<template>
    <div class="w-full h-96 flex justify-center items-center mt-36">
        <form class="w-1/4 shadow-md rounded-md px-5 py-10" @submit="handleSubmit">
            <div class="w-full text-center mb-5">
                <h1 class="text-3xl font-bold">Login</h1>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="email">Email</label>
                <input class="rounded-md border border-gray-500 px-3 py-2" id="email" name="email" type="email" v-model="email" required>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="password">Password</label>
                <input class="rounded-md border border-gray-500 px-3 py-2" id="password" name="password" type="password" v-model="password" required>
            </div>
            <div v-if="errors" class="mb-5">
                <p class="text-red-500 font-bold">{{errors}}</p>
            </div>
            <div class="mb-5">
                <p>you don't have an account? <span class="underline font-semibold"><a href="/register">Create an account</a></span></p>
            </div>
            <div class="text-center">
                <button class="rounded-md border border-gray-500 px-10 py-2 hover:text-white hover:bg-gray-500" type="submit">Login</button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { ref } from "vue";
    import {login} from "../utils/auth"

    const email = ref("")
    const password = ref("")
    let errors = ref("")

    const handleSubmit = async (event) => {
        event.preventDefault();
        const {user, error} = await login(email.value, password.value);
        if (!error) window.location.href = "/"
        errors.value = error;
    }
</script>