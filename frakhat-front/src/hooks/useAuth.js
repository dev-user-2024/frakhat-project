import { useContext } from "react";
import { AuthContext } from "../providers/AuthServiceProvider";
// Custom hook for get context value
export const useAuth = () => {
    const context = useContext(AuthContext);
    if (context === undefined)
        throw new Error('useAuth must be within AuthServiceProvider!')

    return context;
}