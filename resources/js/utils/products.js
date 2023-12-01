import { API_URL } from "../data";
import { useUserStore } from "../stores/user";

export const getProducts = async ({
    offset = 0,
    search = "",
    category = "",
    supplier = "",
}) => {
    const response = await fetch(
        `${API_URL}/api/products?offset=${offset}&search=${search}&category=${category}&supplier=${supplier}`
    );
    return response.json();
};

export const getCategories = async () => {
    const response = await fetch(`${API_URL}/api/categories`);
    return response.json();
};

export const getSuppliers = async () => {
    const response = await fetch(`${API_URL}/api/suppliers`);
    return response.json();
};

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
