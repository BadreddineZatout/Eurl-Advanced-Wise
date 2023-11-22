import { API_URL } from "../data";

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
