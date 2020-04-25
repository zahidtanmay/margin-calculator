import axios from 'axios';

export async function getRequest(url) {
    try {
        return await axios.get(`${url}`);
    } catch (error) {
        return error.response;
    }
}

export async function postRequest(url, data) {
    try {
        return await axios.post(`${url}`, { ...data });
    } catch (e) {
        return e.response;
    }
}
