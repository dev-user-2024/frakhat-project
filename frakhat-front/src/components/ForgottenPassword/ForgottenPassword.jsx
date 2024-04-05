import React from 'react'
import { useState } from 'react'
import Spinner from 'react-bootstrap/Spinner';
import { useAuth } from '../../hooks/useAuth';
import Button from '../../components/buttons/button.component';
import styles from "../../components/login-sections/LoginSections.module.css"
import { useForm } from 'react-hook-form';
import logo from '../../assets/images/login-logo.png'
import { Link } from 'react-router-dom';
import homeIcon from '../../assets/icons/home-login-icon.svg'

function ForgottenPassword() {
    const { hasAuth, goHome, pending, forgotPassword, resetPassword } = useAuth();
    const [step, setStep] = useState(1)

    const {
        register,
        handleSubmit,
        formState: { errors },
        watch,
    } = useForm({ defaultValues: { mobile: "", token: "", password: "", password_confirmation: "" } });

    const handleBack = () => {
        setStep(step - 1)
    }

    const handleSendPhoneNumber = (data) => {
        setStep(step + 1)
        forgotPassword(data)
    }

    const handleSendOtp = () => {
        setStep(step + 1)
    }

    const handleChangePassword = (data) => {
        resetPassword(data)
    }

    const password = watch("password");

    const renderInput = () => {
        switch (step) {
            case 1:
                return (
                    <form onSubmit={handleSubmit(handleSendPhoneNumber)}>
                        <div className={styles.InputSection}>
                            <p>لطفا برای تغییر/بازیابی رمز عبور شماره موبایل خود را وارد کنید</p>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                <input
                                    id="mobile"
                                    {...register("mobile", {
                                        required: "شماره همراه الزامی است",
                                        maxLength: 20
                                    })}
                                />

                            </div>
                            {errors.mobile && <span role="alert" className={styles.InvalidInput}>{errors.mobile.message}</span>}
                        </div>

                        <div className={`w-100 d-flex align-items-center justify-content-center}`}>
                            <Button id="btn_courses" buttonType="loginPageButton" type="submit">
                                <div className='w-100 d-flex justify-content-center '>
                                    {
                                        // pending ? <Spinner animation="grow" variant="light" /> :
                                        "دریافت کد"
                                    }
                                </div>
                            </Button>
                        </div>

                    </form>
                )
            case 2:
                return (
                    <form onSubmit={handleSubmit(handleSendOtp)}>
                        <div className={styles.InputSection}>
                            <p>لطفا کد تایید را وارد کنید</p>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                <input
                                    id="token"
                                    {...register("token", {
                                        required: "کد تایید ورود الزامی است",
                                        maxLength: 20
                                    })}
                                />
                            </div>
                            {errors.token && <span role="alert" className={styles.InvalidInput}>{errors.token.message}</span>}
                        </div>
                        <div className={styles.formButton}>
                            <Link>
                                <button className={`w-100 d-flex justify-content-center ${styles.loginWithCode}`}>
                                    ورود با رمز یکبارمصرف
                                </button>
                            </Link>
                            <Button id="btn_courses" buttonType="loginPageButton" type="submit">
                                <div className='w-100 d-flex justify-content-center '>
                                    {
                                        // pending ? <Spinner animation="grow" variant="light" /> :
                                        "تایید"
                                    }
                                </div>
                            </Button>
                        </div>

                    </form>
                )
            case 3:
                return (
                    <form onSubmit={handleSubmit(handleChangePassword)}>
                        <div className={styles.InputSection}>
                            <p>لطفا رمز عبور جدید را وارد کنید</p>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                <input
                                    id="password"
                                    type="password"
                                    defaultValue=""
                                    {...register("password", {
                                        required: "رمز عبور الزامی است",
                                        minLength: { value: 6, message: "رمز عبور باید حداقل 6 حرفی باشد" },
                                    })}
                                />

                            </div>
                            {errors.password && <span role="alert" className={styles.InvalidInput}>{errors.password.message}</span>}
                        </div>
                        <div className={styles.InputSection}>
                            <p>تکرار رمز عبور جدید</p>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    {...register("password_confirmation", {
                                        required: "تکرار رمز عبور الزامی است",
                                        validate: (value) =>
                                            value === password || "رمز عبور و تکرار آن باید یکسان باشند",
                                    })}
                                />

                            </div>
                            {errors.password_confirmation && <span role="alert" className={styles.InvalidInput}>{errors.password_confirmation.message}</span>}
                        </div>
                        {
                            <Button id="btn_courses" buttonType="loginPageButton" type="submit" >
                                <div className='w-100 d-flex justify-content-center '>
                                    {
                                        pending ? <Spinner animation="grow" variant="light" /> : "تغییر رمز"
                                    }
                                </div>
                            </Button>
                        }
                    </form>
                )

            default:
                break;
        }
    }

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
                    {step > 1 &&
                        <svg onClick={handleBack} xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fillRule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                        </svg>
                    }
                    <div>
                        <img src={logo} alt="" />
                        <h2>فراخط</h2>
                    </div>
                </div>

                <div className={styles.LoginSectionWithEmail}>
                    <div className={styles.LoginSectionWhitUserPass}>
                        {renderInput()}
                    </div>
                    <div className={`${styles.LoginSectionLine} mt-3`}></div>
                    <div className="w-100 text-center" >
                        <Link style={{ color: "#375288" }} to='/forgottenpassword'>رمز خود را فراموش کرده‌اید؟</Link>
                    </div>
                    <p className='w-100 text-center mt-5'>حساب کاربری ندارید؟ <Link to="/signup" style={{ color: "#375288" }} >ایجاد حساب</Link></p>
                </div>

            </div>
        </div >
    )
}

export default ForgottenPassword