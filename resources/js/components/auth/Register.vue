<template>
    <div
        v-if="!userStore.isLogged"
        class="w-full h-96 flex justify-center items-center mt-36"
    >
        <form
            class="w-1/4 shadow-md rounded-md px-5 py-10"
            @submit="handleSubmit"
        >
            <div class="w-full text-center mb-5">
                <h1 class="text-3xl font-bold">Register</h1>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="name">Name</label>
                <input
                    class="rounded-md border border-gray-500 px-3 py-2"
                    id="name"
                    name="name"
                    type="text"
                    v-model="name"
                />
                <p
                    v-if="errorMessages.name"
                    class="ml-3 mt-2 text-red-500 font-bold text-sm"
                >
                    {{ errorMessages.name.toString() }}
                </p>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="email">Email</label>
                <input
                    class="rounded-md border border-gray-500 px-3 py-2"
                    id="email"
                    name="email"
                    type="text"
                    v-model="email"
                />
                <p
                    v-if="errorMessages.email"
                    class="ml-3 mt-2 text-red-500 font-bold text-sm"
                >
                    {{ errorMessages.email.toString() }}
                </p>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="password">Password</label>
                <input
                    id="password"
                    class="rounded-md border border-gray-500 px-3 py-2"
                    name="password"
                    type="password"
                    v-model="password"
                    minlength="8"
                />
                <p
                    v-if="errorMessages.password"
                    class="ml-3 mt-2 text-red-500 font-bold text-sm"
                >
                    {{ errorMessages.password.toString() }}
                </p>
            </div>
            <div class="grid mb-5">
                <label class="font-semibold" for="password"
                    >Confirm Password</label
                >
                <input
                    id="password_confirmation"
                    class="rounded-md border border-gray-500 px-3 py-2"
                    name="password_confirmation"
                    type="password"
                    v-model="password_confirmation"
                    minlength="8"
                />
            </div>
            <div class="mb-5 text-center">
                <p>
                    you already have an account?
                    <span class="underline font-semibold"
                        ><a href="/register">Login</a></span
                    >
                </p>
            </div>
            <div class="text-center">
                <button
                    class="rounded-md border border-gray-500 px-10 py-2 hover:text-white hover:bg-gray-500"
                    type="submit"
                >
                    Register
                </button>
            </div>
        </form>
    </div>
    <div v-else class="w-full text-center my-32">
        <h1 class="text-3xl font-bold">
            You're logged, Redirecting
            <PulseLoader :loading="is_loading" color="rgb(120, 113, 108)" />
        </h1>
    </div>
</template>

<script setup>
import { ref, onBeforeMount } from "vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import { register } from "../../utils/auth";
import { useUserStore } from "../../stores/user";

const name = ref("");
const email = ref("");
const password = ref("");
const password_confirmation = ref("");
let errorMessages = ref({});

const userStore = useUserStore();

onBeforeMount(() => {
    if (userStore.isLogged) window.location.href = "/";
});

const handleSubmit = async (event) => {
    event.preventDefault();
    const { user, token, errors } = await register({
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: password_confirmation.value,
    });
    if (!errors) {
        userStore.isLogged = true;
        userStore.user = user;
        userStore.token = token;
        window.location.href = "/";
    }
    errorMessages.value = errors;
};
</script>
