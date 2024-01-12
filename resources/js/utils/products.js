import { API_URL } from "../data";

export const getProducts = async ({
    offset = 0,
    search = "",
    category = "",
    brand = "",
}) => {
    const response = await fetch(
        `${API_URL}/api/products?offset=${offset}&search=${search}&category=${category}&brand=${brand}`,
    );
    return response.json();
};

export const getCategories = async () => {
    const response = await fetch(`${API_URL}/api/categories`);
    return response.json();
};

export const getBrands = async () => {
    const response = await fetch(`${API_URL}/api/brands`);
    return response.json();
};
