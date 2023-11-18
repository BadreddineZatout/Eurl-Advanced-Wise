<template>
    <div class="w-full h-96 flex justify-center items-center mt-36">
        <form class="w-1/4 shadow-md rounded-md px-5 py-10" @submit="handleSubmit">
            <div class="w-full text-center mb-5">
                <h1 class="text-3xl font-bold">Login</h1>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="email">Email</label>
                <input class="rounded-md border border-gray-500 px-3 py-2" id="email" name="email" type="text" v-model="email">
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="password">Password</label>
                <input class="rounded-md border border-gray-500 px-3 py-2" id="password" name="password" type="password" v-model="password">
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

    const email = ref("")
    const password = ref("")

    const handleSubmit = (event) => {
        event.preventDefault();
        console.log(email.value, password.value)
    }
</script>