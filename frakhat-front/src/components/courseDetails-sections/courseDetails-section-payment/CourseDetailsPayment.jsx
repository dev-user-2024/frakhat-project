

import { useContext, useEffect, useState } from 'react'
import { baseURL } from "../../../services";
import { useAuth } from '../../../hooks/useAuth'

import styles from "./CourseDetailsPayment.module.css"
import { CartContext } from '../../../providers/CartProvider';
import { useNavigate } from 'react-router-dom';

const CourseDetailsPayment = ({ course }) => {
    const [showInputPayment, setShowInputPayment] = useState(false)
    const { hasAuth, user } = useAuth();
    const { addToCart, cartItems } = useContext(CartContext)
    const [isItemInCart, setIsItemInCart] = useState(false);
    const navigate = useNavigate()

    const sendCourse = () => {
        if (hasAuth) {
            addToCart({ course_id: course.id, user_id: user.id }, course);
        } else {
            addToCart({ course_id: course.id, user_id: '' }, course)
        }
    }

    useEffect(() => {
        setIsItemInCart(cartItems?.cart_items?.course?.some(cartItem => cartItem.id === course.id));
    }, [cartItems, course.id]);

    return (
        <div id="CourseDetailsPayment" className={`${styles.CourseDetailsPayment} d-flex flex-column align-items-center justify-content-center`}>
            <div className={`${styles.CourseDetailsPayment_card}`}>

                <div>
                    <h6>زمان برگزاری دوره:</h6>
                    <p>{course.period_time_course}</p>
                </div>

                <div>
                    <h6>محتوای دوره:</h6>
                    <p>بیش از 120 ساعت آموزش ویدیویی</p>
                </div>

                <div>
                    <h6>شهریه دوره:</h6>
                    <p>{course.price_course} هزار تومان</p>
                </div>

            </div>

            {isItemInCart ? <button className={`${styles.show_cart}`} type="button" onClick={() => navigate('/buyCourse')} >نمایش سبد خرید</button> : <button className={`${styles.payment_button}`} type="button" onClick={sendCourse} >ثبت نام در دوره</button>}
        </div>
    )
}

export default CourseDetailsPayment