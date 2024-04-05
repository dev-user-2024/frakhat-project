import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";
import "./index.css";
import "./assets/css/fontiran.css";
import "swiper/css/bundle";
import App from "./App";
import AuthServiceProvider from './providers/AuthServiceProvider';
import CartProvider from './providers/CartProvider';
import reportWebVitals from "./reportWebVitals";
import ThemeProvider from "./components/ThemeProvider/ThemeProvider";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <AuthServiceProvider>
        <ThemeProvider>
          <CartProvider>
            <App />
          </CartProvider>
        </ThemeProvider>
      </AuthServiceProvider>
    </BrowserRouter>
  </React.StrictMode >
);

reportWebVitals();
