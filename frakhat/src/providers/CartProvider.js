import { createContext, useCallback, useMemo, useState, useEffect } from 'react';
import { api } from '../services';
import { errorAlert, successAlert } from './AlertServiceProvider';
import { useAuth } from '../hooks/useAuth';
import { useNavigate } from 'react-router-dom';
import toast from 'react-hot-toast';

export const CartContext = createContext(null);

const CartProvider = ({ children }) => {
    const [cartItems, setCartItems] = useState(() => {
        const items = localStorage.getItem('cartItems');
        return items ? JSON.parse(items) : { cart_items: { course: [] } };
    });
    const { hasAuth, user } = useAuth();
    const cartItemsMemo = useMemo(() => cartItems, [cartItems]);
    const [itemCount, setItemCount] = useState()
    const navigate = useNavigate()

    useEffect(() => {
        (async () => {
            if (hasAuth) {
                // await updateCartItemsFromLocalStorageToDatabase(user.id)
                await getCartItems(user.id)
            } else {
                await getCartItemsFromLocalStorage()
            }
        })()
    }, [hasAuth])


    const addToCart = useCallback(
        async (body, course) => {
            try {
                if (hasAuth) {
                    const { data: { status, message } } = await api().post('/add-to-cart', body);
                    if (status === 'success') {
                        getCartItems(body.user_id)
                        successAlert(message);
                    }
                } else {
                    successAlert('آیتم مورد نظر به سبد خرید اضافه شد');
                    const newCartItems = {
                        cart_items: {
                            course: [...(cartItems?.cart_items?.course || []), course],
                        },
                    };
                    localStorage.setItem('cartItems', JSON.stringify(newCartItems));
                    setCartItems(newCartItems);
                }
            } catch (error) {
                console.log(error);
            }
        },
        [hasAuth, cartItems]
    )

    const getCartItems = async (userId, params) => {
        try {
            const { data: { data } } = await api().get(`/cart-items/${userId}/courses`, { params });
            setCartItems(data || []);
            localStorage.setItem('cartItems', JSON.stringify(data || []));
            setItemCount(data.cart_items.course);
            return data
        } catch (error) {
            return error.response.data.data
        }
    };

    const getCartItemsFromLocalStorage = () => {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        setCartItems(cartItems);
    };

    const updateCartItemsFromLocalStorageToDatabase = async (user_id) => {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        if (cartItems?.cart_items?.course?.length > 0) {
            try {
                await api().post('/add-list-to-cart', {
                    course_ids: JSON.stringify(cartItems?.cart_items?.course?.map(item => item.id)),
                    user_id
                })
            } catch (error) {
                console.log(error);
            }
        }
    };

    const removeFromCart = useCallback(
        async (body) => {
            try {
                if (hasAuth) {
                    const { data: { status, message } } = await api().post('/remove-to-cart', body)
                    if (status === 'success') {
                        await getCartItems(body.user_id);
                        errorAlert(message);
                    }
                } else {
                    errorAlert('آیتم مورد نظر از سبد خرید حذف شد');
                    const updateCartItem = cartItems?.cart_items?.course.filter(item => item.id !== body.course_id)
                    const newCartItems = {
                        cart_items: {
                            course: updateCartItem,
                        },
                    };
                    localStorage.setItem('cartItems', JSON.stringify(newCartItems));
                    setCartItems(newCartItems);
                }
            } catch (error) {
                console.log(error);
            }
        },
        [cartItems, hasAuth]
    )

    const payment = async (body) => {
        try {
            const { data } = await api().post(`payment`, body)
            if (data?.status === 'success') {
                window.location.href = data.url
            }else{
                toast.success(data.message)
                navigate('/user-panel')
            }
            await getCartItems()
        } catch (error) {
            console.log(error);
        }
    }
    return (
        <CartContext.Provider value={{ addToCart, getCartItems, removeFromCart, cartItems: cartItemsMemo, payment, getCartItemsFromLocalStorage, updateCartItemsFromLocalStorageToDatabase, itemCount }}>
            {children}
        </CartContext.Provider>
    );
};


export default CartProvider