import axios from "axios";
import { toast } from "react-hot-toast";

export const productionMode = true;
export const baseURL = productionMode
  ? "https://app.frakhat.ir"
  : "http://127.0.0.1:8000";


export const api = () => {

  const access_token = localStorage.getItem('access_token')

  const api = axios.create({
    baseURL: "https://support.frakhat.ir/api/v1",
  });


  api.interceptors.request.use(req => {

    if (access_token) {
      req.headers.Authorization = `Bearer ${access_token}`
    }
    return req

  })

  api.interceptors.response.use(
    (res) => res,
    (err) => {
      switch (err.response?.status) {
        case 400:
          toast.error(err.response.data.message);
          break;
        case 401:
          break;
        case 402:
          toast.error(err.response.data.message);
          break;
        case 404:
          toast.error(`${err.config.url} not found`);
          break;
        case 429:
          toast.error(err.response.data.message);
          break;
          case 422:
          toast.error(err.response.data.message);
          break;
        case 500:
          toast.error(err.response.data.message);
          break;
        default:
          console.error(err);
          break;
      }
      return Promise.reject(err);
    }
  );

  return api;
};
