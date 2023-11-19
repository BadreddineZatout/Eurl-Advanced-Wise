import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
    state: () => {
        return {
            isLogged: false,
            data: {},
            token: "test token",
        };
    },
    persist: true,
});
