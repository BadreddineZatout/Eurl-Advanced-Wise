import { API_URL } from "../data";
import { useUserStore } from "../stores/user";

export const saveOrder = async (data) => {
    const userStore = useUserStore();
    const response = await fetch(`${API_URL}/api/orders`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${userStore.token}`,
        },
        body: JSON.stringify(data),
    });
    return response.json();
};

export const cancelOrder = async (order_id) => {
    const userStore = useUserStore();
    const response = await fetch(`${API_URL}/api/orders/${order_id}/cancel`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${userStore.token}`,
        },
    });
    return response.json();
};
