
import { useEffect, useState, useContext } from 'react'
import { Link, useNavigate } from 'react-router-dom'
import Spinner from 'react-bootstrap/Spinner';
import { useSearchParams } from "react-router-dom"
import { useAuth } from './../../hooks/useAuth';
import Button from './../../components/buttons/button.component';
import styles from "./../../components/login-sections/LoginSections.module.css"
import { useForm } from 'react-hook-form';
import logo from '../../assets/images/login-logo.png'
import homeIcon from '../../assets/icons/home-login-icon.svg'
import { CartContext } from '../../providers/CartProvider';

const Login = () => {
    const { hasAuth, login, goHome, pending, user } = useAuth();
    const navigate = useNavigate()
    const { register, handleSubmit, formState: { errors }, reset } = useForm();
    const [getPhoneNumber, setGetPhoneNumber] = useState(false);

    let [searchParams] = useSearchParams()
    let url;

    const handleNext = (data) => {
        setGetPhoneNumber(true)
    }

    const handleBack = () => {
        reset()
        setGetPhoneNumber(false)
    }

    const submitLogin = async (data) => {
        const response = await login(data, () => {
            url = searchParams.get("url")
            url === null
            ? navigate("/user-panel")
            : navigate(`/${url}`)
        });
            }

    useEffect(() => {
        if (hasAuth) {
            goHome();
        }
    }, [goHome, hasAuth])

    return (
        <div className={styles.LoginSectionsContainer}>
            <div className={styles.home_link}>
                <Link to='/'>
                    <img src={homeIcon} alt="" />
                    <p>بازگشت به خانه</p>
                </Link>
            </div>
            <div className={styles.LoginSections}>
                <div className={styles.LoginHeader}>
                    {getPhoneNumber &&
                        <svg onClick={handleBack} xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fillRule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                        </svg>
                    }
                    <div>
                        <img src={logo} alt="" />
                        {!getPhoneNumber && <h2>به <span style={{ color: "#375288" }}>فراخط</span> خوش آمدید</h2>}
                        {getPhoneNumber && <h2>فراخط</h2>}
                    </div>
                </div>

                <div className={styles.LoginSectionWithEmail}>
                    <div className={styles.LoginSectionWhitUserPass}>
                        {!getPhoneNumber &&

                            <form onSubmit={handleSubmit(handleNext)}>
                                <div className={styles.InputSection}>
                                    <p>لطفا شماره موبایل خود را وارد کنید</p>
                                    <div className={styles.LoginSectionWhitUserPassInput}>
                                        <input
                                            id="mobile"
                                            {...register("mobile", {
                                                required: "شماره همراه الزامی است",
                                                maxLength: 20
                                            })}
                                            type="mobile"
                                        />

                                    </div>
                                    {errors.mobile && <span role="alert" className={styles.InvalidInput}>{errors.mobile.message}</span>}
                                </div>
                                <Button id="btn_courses" buttonType="loginPageButton" type={pending ? "button" : "submit"} >
                                    <div className='w-100 d-flex justify-content-center '>
                                        ورود
                                    </div>
                                </Button>
                            </form>
                        }
                        {getPhoneNumber &&
                            <form action="" onSubmit={handleSubmit(submitLogin)}>
                                <div className={styles.InputSection}>
                                    <p>رمز عبور خود را وارد کنید</p>
                                    <div className={styles.LoginSectionWhitUserPassInput}>
                                        <input
                                            placeholder='رمز عبور'
                                            id="password"
                                            {...register("password", {
                                                required: "رمزعبور الزامی است",
                                            })}
                                            type="password"
                                        />
                                    </div>
                                    {errors.password && <span role="alert" className={styles.InvalidInput} >{errors.password.message}</span>}
                                </div>
                                <div className={styles.formButton}>
                                    <Link>
                                        <button className={`w-100 d-flex justify-content-center ${styles.loginWithCode}`}>
                                            ورود با رمز یکبارمصرف
                                        </button>
                                    </Link>
                                    <Button id="btn_courses" buttonType="loginPageButton" type={pending ? "button" : "submit"} >
                                        <div className='w-100 d-flex justify-content-center '>
                                            {
                                                pending ? <Spinner animation="grow" variant="light" /> : "تایید"
                                            }
                                        </div>
                                    </Button>
                                </div>
                            </form>
                        }
                    </div>
                    <div className={`${styles.LoginSectionLine} mt-5`}></div>

                    <div className="w-100 text-center" >
                        <Link style={{ color: "#375288" }} to='/forgottenpassword'>رمز خود را فراموش کرده‌اید؟</Link>
                    </div>
                    <p className='w-100 text-center mt-5'>حساب کاربری ندارید؟ <Link to="/signup" style={{ color: "#375288" }} >ایجاد حساب</Link></p>


                </div>

            </div>
        </div>
    )
}

export default Login