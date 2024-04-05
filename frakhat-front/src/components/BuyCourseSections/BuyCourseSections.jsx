import { useContext, useRef, useState } from 'react'
import { Link, useNavigate } from 'react-router-dom'
import Button from "../buttons/button.component"
import closeIcon from "../../assets/icons/cart-close.icon.svg"
import styles from "./BuyCourseSections.module.css"
import { useAuth } from '../../hooks/useAuth';
import { CartContext } from '../../providers/CartProvider';
import CartTitleLine from '../UI/cart-title-line/CartTitleLine';
import bagIcon from '../../assets/icons/bag-icon.svg'
import paymentIcon from '../../assets/icons/payment-icon.svg'
import { Modal } from 'react-bootstrap'
import { formatCurrency } from '../../utils/formatCurrency'


const BuyCourseSections = () => {
    const { hasAuth, user } = useAuth();
    const { removeFromCart, cartItems, payment, getCartItems } = useContext(CartContext)
    const [discount, setDiscount] = useState('')
    const inputRef = useRef(null);
    const [showModal, setShowModal] = useState(false)
    const navigate = useNavigate()

    const removeCart = (course_id) => {
        hasAuth ? removeFromCart({ user_id: user.id, course_id }) : removeFromCart({ user_id: '', course_id })
    }

    const handleDiscountCode = async (e) => {
        e.preventDefault();
        const discountCode = {
            discount_code: inputRef.current.value
        };
        getCartItems(user.id, discountCode);
        setDiscount(await getCartItems(user.id, discountCode));
    };

    const handlePayment = async () => {
        hasAuth ? payment({ cart_id: cartItems?.cart_id, user_id: user.id, code: inputRef.current.value }) : navigate('/signup')
    }

    return (
        <div className={styles.BuyCourseSections}>
            {
                discount && discount.discount_message ?
                    <div className={styles.DiscountMessage}>
                        <p>{discount.discount_message}</p>
                    </div> : ''
            }
            <div className={`${styles.BuyCourseSectionCart} mt-5`}>
                <CartTitleLine title="سبد خرید" icon={bagIcon} />
                <div className={styles["table-container"]}>
                    <div className={styles["table-header"]}>
                        <div className={styles["table-row"]}>
                            <div className={styles["table-cell-head"]}>نام دوره</div>
                            <div className={styles["table-cell-head"]}>
                                <p>مبلغ دوره</p>
                            </div>
                        </div>
                    </div>
                    <div className={styles["table-body"]}>
                        {cartItems?.cart_items?.course?.map((item, index) => (
                            <div className={styles["table-row"]} key={index}>
                                <div onClick={() => removeCart(item.course_id || item.id)} className={styles["table-cell-1"]}><img src={closeIcon} alt="" /> حذف</div>
                                <div className={styles["table-cell-2"]}>{item.title_course}</div>
                                <div className={styles["table-cell-3"]}>
                                    {
                                        discount.discount_message ?
                                            <>
                                                <p className={`${styles.previousPrice} ${styles.fadeOut}`}>{new Intl.NumberFormat('de-DE').format(item.price_course)} تومان</p>
                                                <p className={`${styles.corseDiscount} ${styles.fadeIn}`}>{new Intl.NumberFormat('de-DE').format(item.discounted_price)} تومان</p>
                                            </>
                                            :
                                            <p className='styles.fadeOut'>{new Intl.NumberFormat('de-DE').format(item.price_course)} تومان</p>

                                    }
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>

            <div className={`${styles.BuyCourseSectionPayment} d-flex flex-column mt-5`}>
                <CartTitleLine title="پرداخت" icon={paymentIcon} />
                <div className='d-flex align-items-center mt-3'>
                    <Link onClick={() => setShowModal(true)} style={{ color: "#375288", textDecoration: 'underline' }}> قوانین و مقررات </Link> فراخط را پذیرفته‌ام
                </div>
                <div className={`${styles.BuyCourseSectionForm_inputs} d-flex justify-content-between mt-2`}>
                    <form className={`d-flex flex-column`} onSubmit={handleDiscountCode}>
                        <label className="form-input-label">کد تخفیف</label>
                        <span
                            className="d-flex"
                            id={styles.discount_code}
                        >
                            <input
                                className={`${styles.pagesFormInput}`}
                                type="text"
                                required
                                ref={inputRef}
                            />
                            <Button id="btn_courses" buttonType="buycourseDiscountButton">
                                اعمال تخفیف
                            </Button>
                        </span>
                    </form>

                    <div className={`d-flex flex-column`}>
                        <label className="form-input-label">مبلغ قابل پرداخت</label>
                        <div className={styles.pagesFormInput}>
                            {cartItems?.total_price && (
                                discount.discount_message ? (
                                    <div>
                                        <p className={`${styles.fadeOut}`}>{formatCurrency(cartItems.total_price)}</p>
                                        <p className={`${styles.fadeIn}`}>{formatCurrency(cartItems.discounted_total_price)}</p>
                                    </div>
                                ) : formatCurrency(cartItems.total_price)
                            )}
                        </div>
                    </div>

                </div>
                <div className={"d-flex justify-content-end w-100 align-self-end mt-3"}>
                    <Button id="btn_courses" buttonType="paymentButton" type="button" onClick={handlePayment}>
                        پرداخت
                    </Button>
                </div>
            </div>

            <Modal size="lg" className={styles["custom-modal"]} show={showModal} onHide={() => setShowModal(false)} dir="rtl" centered>
                <Modal.Header closeButton className={styles['modal-header']}>
                    <Modal.Title className={styles['modal-title']}>قوانین و شرایط استفاده از خدمات</Modal.Title>
                </Modal.Header>
                <Modal.Body className={styles['modal-body']}>
                    <p>استفاده از آموزش‌های <span style={{ color: "#00ACEE" }}>«فراخط»</span> به منزله قبول شرایط زیر است:</p>
                    <p>هر آموزش سفارش داده شده، صرفا مختص استفاده دریافت کننده اصلی آن محصول است و فرد دریافت‌کننده، نباید آن را به هر نحوی منتشر کند و یا در اختیار دیگران قرار دهد.</p>
                    <ul>
                        <li>اهداف آموزشی هر آموزش، بر اساس دسته بندی آن دوره متفاوت است.</li>
                        <li>برای برخورداری از خدمات هر آموزش باید در تمامی کلاس ها حاضر بوده، پروژه پایانی را تحویل بدهید و حداقل نمره 85 از 100 را کسب نمایید.</li>
                        <li> آموزش های موجود در پنل کاربری شما تا بازه یکسال وجود خواهد داشت.</li>
                    </ul>
                </Modal.Body>
                <Modal.Footer className={styles['modal-footer']}>
                    <button type='submit' onClick={() => setShowModal(false)} className={styles["accept-btn"]}>
                        متوجه شدم
                    </button>
                </Modal.Footer>
            </Modal>
        </div>
    )
}

export default BuyCourseSections