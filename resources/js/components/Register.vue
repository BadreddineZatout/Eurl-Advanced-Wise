<template>
    <div class="w-full h-96 flex justify-center items-center mt-36">
        <form class="w-1/4 shadow-md rounded-md px-5 py-10" @submit="handleSubmit">
            <div class="w-full text-center mb-5">
                <h1 class="text-3xl font-bold">Register</h1>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="name">Name</label>
                <input class="rounded-md border border-gray-500 px-3 py-2" id="name" name="name" type="text" v-model="name">
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="email">Email</label>
                <input class="rounded-md border border-gray-500 px-3 py-2" id="email" name="email" type="text" v-model="email">
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="password">Password</label>
                <input id="password" 
                class="rounded-md border border-gray-500 px-3 py-2" 
                name="password" 
                type="password" 
                v-model="password" 
                minlength="8">
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="password">Confirm Password</label>
                <input id="password_confirmation" 
                class="rounded-md border border-gray-500 px-3 py-2" 
                name="password_confirmation" 
                type="password" 
                v-model="password_confirmation" 
                minlength="8">
            </div>
            <div v-if="errors" class="mb-5">
                <p class="text-red-500 font-bold">{{errors}}</p>
            </div>
            <div class="mb-5 text-center">
                <p>you already have an account? <span class="underline font-semibold"><a href="/register">Login</a></span></p>
            </div>
            <div class="text-center">
                <button class="rounded-md border border-gray-500 px-10 py-2 hover:text-white hover:bg-gray-500" type="submit">Register</button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { ref } from "vue";
    import { register } from "../utils/auth";
    import {useUserStore} from "../stores/user"

    const name = ref("")
    const email = ref("")
    const password = ref("")
    const password_confirmation = ref("")
    let errors = ref("")

    const userStore = useUserStore()

    const handleSubmit = async (event) => {
        event.preventDefault();
        const {user, token, error} = await register({
            name: name.value,
            email: email.value,
            password: password_confirmation.value,
            password_confirmation: password_confirmation.value
        });
        if (!error) {
            userStore.isLogged = true;
            userStore.user = user;
            userStore.token = token;
            window.location.href = "/";
        }
        errors.value = error;
    }
</script>