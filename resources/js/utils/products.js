import { API_URL } from "../data";

export const getProducts = async (offset) => {
    const response = await fetch(`${API_URL}/api/products?offset=${offset}`);
    return response.json();
};
