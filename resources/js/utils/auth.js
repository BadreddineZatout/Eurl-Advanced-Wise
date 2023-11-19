import { API_URL } from "../data";

export const login = async (email, password) => {
    const response = await fetch(`${API_URL}/api/login`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            email,
            password,
        }),
    });
    return response.json();
};

export const register = async (userData) => {
    const response = await fetch(`${API_URL}/api/register`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userData),
    });
    return response.json();
};

export const logout = async (userData) => {
    const response = await fetch(`${API_URL}/api/logout`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
    });
    return response.json();
};
