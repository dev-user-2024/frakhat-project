
import { useState } from 'react'
import { Link, useNavigate } from 'react-router-dom'
import Spinner from 'react-bootstrap/Spinner';
import { useSearchParams } from "react-router-dom"
import { useAuth } from '../../hooks/useAuth';
import Button from '../../components/buttons/button.component';
import styles from "./../../components/login-sections/LoginSections.module.css"
import { useForm } from 'react-hook-form';
import logo from '../../assets/images/login-logo.png'
import homeIcon from '../../assets/icons/home-login-icon.svg'

const Login = () => {

    const { getLoginCode, loginWithCode, pending } = useAuth();
    const [phoneNumber, setPhoneNumber] = useState("");
    const [code, setCode] = useState("");
    const [getingCode, setGetingCode] = useState(false);
    const navigate = useNavigate()
    const { register, handleSubmit, formState: { errors } } = useForm();

    let [searchParams] = useSearchParams()
    let url;

    const handleBack = () => {
        setGetingCode(false)
        setPhoneNumber("")
        setCode("")
    }

    const submitLoginCode = async (data) => {
        phoneNumber && setGetingCode(true)
        await getLoginCode(data, code, () => { });
    }

    const submitLogin = async (data) => {
        await loginWithCode(data, () => {
            url = searchParams.get("url")
            url === null
                ? navigate("/user-panel")
                : navigate(`/${url}`)
        });
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
                    {getingCode &&
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
                        {!getingCode &&
                            <form onSubmit={handleSubmit(submitLoginCode)}>
                                <div className={styles.InputSection}>
                                <p>لطفا شماره موبایل خود را وارد کنید</p>
                                    <div className={styles.LoginSectionWhitUserPassInput}>
                                        <input
                                            id="mobile"
                                            {...register("mobile", {
                                                required: "شماره همراه الزامی است",
                                                maxLength: 20
                                            })}
                                            onChange={(e) => setPhoneNumber(e.target.value)}
                                        />

                                    </div>
                                    {errors.mobile && <span role="alert" className={styles.InvalidInput}>{errors.mobile.message}</span>}
                                </div>

                                <div className={`w-100 d-flex align-items-center justify-content-center ${getingCode && "d-none"}`}>
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
                        }
                        {
                            getingCode &&
                            <form onSubmit={handleSubmit(submitLogin)}>
                                <div className={styles.InputSection}>
                                    <p>لطفا کد تایید را وارد کنید</p>
                                    <div className={styles.LoginSectionWhitUserPassInput}>
                                        <input
                                            id="code"
                                            {...register("code", {
                                                required: "کد تایید ورود الزامی است",
                                                maxLength: 20
                                            })}
                                            onChange={(e) => setCode(e.target.value)}
                                        />

                                    </div>
                                    {errors.code && <span role="alert" className={styles.InvalidInput}>{errors.code.message}</span>}
                                </div>


                                {
                                    <Button id="btn_courses" buttonType="loginPageButton" type="submit" >
                                        <div className='w-100 d-flex justify-content-center '>
                                            {
                                                pending ? <Spinner animation="grow" variant="light" /> : "ورود"
                                            }
                                        </div>
                                    </Button>
                                }
                            </form>
                        }
                    </div>



                    <div className={`${styles.LoginSectionLine} mt-3`}></div>

                    <p className='w-100 text-center mt-5'><Link to="/login" style={{ color: "#375288" }} >ورود به حساب کاربری</Link></p>

                </div>

            </div>
        </div >
    )
}

export default Login