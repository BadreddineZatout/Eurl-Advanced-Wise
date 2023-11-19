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
