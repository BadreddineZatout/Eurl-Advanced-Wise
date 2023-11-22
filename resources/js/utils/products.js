import { API_URL } from "../data";

export const getProducts = async ({ offset = 0, search = "" }) => {
    const response = await fetch(
        `${API_URL}/api/products?offset=${offset}&search=${search}`
    );
    return response.json();
};
