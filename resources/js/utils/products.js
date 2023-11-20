import { API_URL } from "../data";

export const getProducts = async () => {
    const response = await fetch(`${API_URL}/api/products`);
    return response.json();
};
