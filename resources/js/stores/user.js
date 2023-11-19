import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
    state: () => {
        return {
            isLogged: false,
            user: {},
            token: "",
        };
    },
    persist: true,
});
