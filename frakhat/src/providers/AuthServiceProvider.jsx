import { createContext, useState } from "react";
import { api } from '../services';
import Response from '../services/Response';
import useLocalStorage from "../hooks/useLocalStorage";
import { useNavigate } from 'react-router-dom'
import { successAlert, errorAlert, successLoginMessage, connectionError } from './AlertServiceProvider';

export const AuthContext = createContext(null);
export const InitailAuthParams = {
    hasAuth: false,
    access_token: null,
    code: null,
    user: null
}
export const PanelHomeURL = "/user-panel"

const AuthServiceProvider = ({ children }) => {
    const [auth, setAuth] = useLocalStorage('_auth', InitailAuthParams);
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();

    // helper function for manage login actions
    const login = async (body, callback = () => { }) => {
        setLoading(true);
        try {
            // send credentials to login API
            const res = await api().post('/user-auth/user-login', body);
            // create response instance
            const response = new Response(res);
            const { api_token } = response.data.user
            if (response.status === 'success') {
                // set login state
                localStorage.setItem("access_token", api_token)
                setAuth({ hasAuth: true, user: response.data.user });
                successAlert(successLoginMessage)
            } else {
                setAuth({ hasAuth: false, user: null });
            }
            callback(response);
            return response
        } catch (error) {
            console.log(error);
        } finally {
        setLoading(false);
        }
    }

    //   get login code
    const getLoginCode = async (body, callback = () => { }) => {
        try {
            // send phoneNumber to getCode to login API
            const res = await api().post('/api/auth/register_user', body);

            // create response instance
            const response = new Response(res);
            response.status === 'success' && successAlert(response.message)
            // callback(response);
        } catch (error) {
            const { response } = error
            if (response.status === 400){
                localStorage.setItem("access_token", response.data.api_token)
                setAuth({ hasAuth: true, user: response.data.user });
                navigate('/user-panel')
            }
        }
    }

    // Login with Code and phoneNumber
    const loginWithCode = async (body, callback = () => { }) => {
        setLoading(true);
        try {
            // send credentials to login API
            const res = await api().post('/user-auth/check-token', {
                token: body.code,
            });
            // create response instance
            const response = new Response(res);
            response.status === 'success' && successAlert(response.message)
            console.log(response.status);
            const { api_token } = response.data.user

            if (response.hasFailed()) {
                setAuth({ hasAuth: false });
            } else {
                // set login state
                localStorage.setItem("access_token", api_token)
                setAuth({ hasAuth: true, user: response.data.user });
            }
            callback(response);
        } catch (error) {
            errorAlert(connectionError)
        } finally {
            setLoading(false);
        }
    }

    // Helper function for user logoutting
    const logout = async () => {
        setLoading(true);
        try {
            console.log('logout...')
            // send credentials to login API
            const res = await api().post('/user-auth/logout');
            // create response instance
            const response = new Response(res);
            response.status === 200 && successAlert(response.message)
            if (response.hasFailed()) {
            } else {
                // destroy user data
                setAuth({ hasAuth: false, user: null });
                localStorage.removeItem("access_token")
                localStorage.removeItem("cartItems")
            }

        } catch (error) {
            console.warn('connection error!')
        } finally {
            setLoading(false)
        }

    }

    const forgotPassword = async (mobile) => {
        try {
            const { data: { status } } = await api().post('/user-auth/forgot-password', mobile)
            if (status === 'success') {
                successAlert('کد ارسال شد')
            }
        } catch (error) {
            console.log(error);
        }
    }

    const resetPassword = async (body) => {
        try {
            const res = await api().post('/user-auth/reset-password', body)
            if (res.status === 200) {
                successAlert('تغییرات با موفقیت اعمال شد')
                navigate('/login')
            }
        } catch (error) {
            console.log(error);
        }
    }

    const goHome = (url = PanelHomeURL) => {
        if (typeof url !== 'string') url = PanelHomeURL;
        if (auth.hasAuth) {
            navigate(url);
        }
    }
    return (
        <AuthContext.Provider value={{
            hasAuth: auth.hasAuth,
            pending: loading,
            token: auth.access_token,
            login,
            getLoginCode,
            code: auth.code,
            loginWithCode,
            logout,
            goHome,
            user: auth.user,
            forgotPassword,
            resetPassword,
        }}>
            {children}
        </AuthContext.Provider>
    )
}
export default AuthServiceProvider