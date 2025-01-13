import axios from "axios";

const instandAxios = axios.create({
  baseURL: "http://127.0.0.1:8001/api/",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

export default instandAxios;
