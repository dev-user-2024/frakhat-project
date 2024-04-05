
import { useState, useEffect } from 'react'
import Button from '../buttons/button.component'
import axios from 'axios'
import { Label, Input } from 'reactstrap';
import { Link } from 'react-router-dom'
import styles from "./SignupSections.module.css"

import gmailIcon from "../../assets/icons/gmailIcon.svg"
import yahooIcon from "../../assets/icons/yahooIcon.svg"

const SignupSections = () => {

    const [fname, setFname] = useState("")
    const [lname, setLname] = useState("")
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [confirmPassword, setConfirmPassword] = useState("");

    const submitSignup = (e) => {
        e.preventDefault()

        try {
            // Handle validations
            if (password <= password.length) {
            }
            if (password === confirmPassword) {

                if (password => password.length) {


                    axios.post(`/api/auth/register_user`, null, {
                        params: {
                            fname: fname,
                            lname: lname,
                            email: email,
                            password: password
                        }
                    }).then(response => console.log(response))
                    console.log("ثبت نام با موفقیت انجام شد")
                } else {
                    console.log("پسورد نباید کم تر از 8 کاراکتر باشد")
                }

            } else {
                console.log("پسوردها متفاوت هستند")
            }
            //   toast.success("")
        } catch (error) {

            //   toast.error()
            console.log(error.message);

        }
    }


    return (
        <div className={styles.LoginSectionsContainer}>
            <div className={styles.LoginSections}>

                <h2>به <span style={{ color: "#375288" }}>فراخط</span> خوش آمدید</h2>

                <div className={styles.LoginSectionWithEmail}>

                    {/* <Button id="btn_courses" buttonType="loginPageButton" type="button" >
                        <span className={`w-25 h-100 px-0 py-1`} style={{ background: "#fff" }}>
                            <img src={gmailIcon} alt="" />
                        </span>
                        <p className='w-75 d-flex justify-content-center '>
                            ورود با گوگل
                        </p>
                    </Button>

                    <Button id="btn_courses" buttonType="loginPageButton" type="button" >
                        <span className={`w-25 h-100 px-0 py-1`} style={{ background: "#fff" }}>
                            <img src={yahooIcon} alt="" />
                        </span>
                        <p className='w-75 d-flex justify-content-center '>
                            ورود با گوگل
                        </p>
                    </Button>


                    <p className='text-center my-4 py-3'>یا</p> */}



                    <div className={styles.LoginSectionWhitUserPass}>
                        <form action="" method="post" onSubmit={submitSignup}>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                نام
                                <input
                                    type="text"
                                    value={fname}
                                    required
                                    onChange={e => setFname(e.target.value)}
                                />

                            </div>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                نام خانوادگی
                                <input
                                    type="text"
                                    value={lname}
                                    required
                                    onChange={e => setLname(e.target.value)}
                                />

                            </div>
                            <div className={styles.LoginSectionWhitUserPassInput}>
                                آدرس ایمیل
                                <input
                                    type="email"
                                    value={email}
                                    required
                                    onChange={e => setEmail(e.target.value)}
                                />

                            </div>

                            <div className={styles.LoginSectionWhitUserPassInput}>
                                رمز عبور
                                <input
                                    type="password"
                                    value={password}
                                    required
                                    onChange={e => setPassword(e.target.value)}
                                />

                            </div>

                            <div className={styles.LoginSectionWhitUserPassInput}>
                                تکرار رمز عبور
                                <input
                                    type="password"
                                    value={confirmPassword}
                                    required
                                    onChange={e => setConfirmPassword(e.target.value)}
                                />

                            </div>

                            {/* <div className='d-flex align-items-center mt-3 mb-5'>
                                <Input
                                    id="rememberMe"
                                    name="rememberMe"
                                    type="checkbox"
                                />
                                <Label
                                    check
                                    for="rememberMe"
                                >
                                    مرا به خاطر بسپار
                                </Label>
                            </div> */}

                            <Button id="btn_courses" buttonType="loginPageButton" type="submit" >
                                <p className='w-100 d-flex justify-content-center '>
                                    ورود
                                </p>
                            </Button>
                        </form>
                        <div className="w-100 text-center" >
                            <Link style={{ color: "#375288" }}>رمز خود را فراموش کرده‌اید؟</Link>
                        </div>

                    </div>


                    <div className={`${styles.LoginSectionLine} mt-5`}></div>

                    <p className='w-100 text-center mt-5'>حساب کاربری دارید؟ <Link style={{ color: "#375288" }} to="/login">ورود</Link></p>

                </div>

            </div>
        </div>
    )
}

export default SignupSections