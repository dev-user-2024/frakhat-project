import React from "react";
import { useAuth } from "./../hooks/useAuth";
import { Navigate, Outlet } from "react-router-dom";

const ProtectedRoute = () => {
  const { hasAuth } = useAuth();

  return hasAuth ? <Outlet /> : <Navigate to="/login" />;
};

export default ProtectedRoute;
