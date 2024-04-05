import React, { useEffect } from 'react'
import miniLogo from "../../assets/images/miniLogo.svg"
import callCalling from "../../assets/icons/call-calling.svg"
import sms from "../../assets/icons/sms.svg"
import location from "../../assets/icons/location.svg"


import styles from "./contactUs.module.css"
import { useForm } from 'react-hook-form';
import Button from '../../components/buttons/button.component';
import { api } from '../../services'
import { successAlert, errorAlert } from '../../providers/AlertServiceProvider';
import { convertNumberToPersian } from '../../utils/convertNumberToPersian'

const ContactUs = () => {
    const { register, handleSubmit, formState: { errors }, reset } = useForm();

    const submitMessage = async (data) => {
        const res = await api().post('/contact-frakhat', data)
        res.status === 200 ? successAlert('پیام شما با موفقیت ارسال شد') : errorAlert('مشکلی در ارسال پیام پیش آمده')
        reset()
    }

    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <>
            <div className={styles.ContactUs}>
                <div className={styles.ContactUsContainer}>
                    <div>
                        <div className={styles.ContactContent} id={styles.AboutContentFirstItem}>
                            <div>
                                <div className={styles.ContactTitle}>
                                    <img src={miniLogo} alt="" />
                                    <h2>
                                        تماس با ما
                                    </h2>
                                </div>

                                <p>
                                    برای اینکه با مجموعه ما ارتباط بگیرید کافیه یکی از راه های زیر را امتحان کنید فراخط کنارشماست.                                .
                                </p>
                            </div>
                            <div className={styles.trapezium2}>
                                <div></div>
                                <div></div>
                                <div>
                                    <ul>
                                        <li>
                                            <img src={callCalling} alt="" />
                                            <div>
                                                <span>{convertNumberToPersian('02191692065')}</span>
                                                <span>{`${convertNumberToPersian('02142863000')} داخلی ${convertNumberToPersian('784')}`}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <img src={sms} alt="" />
                                            <div>
                                                <span>روابط عمومی: info@frakhat.ir</span>
                                                <span>سردبیر: mohammadhkalaji0710@gmail.com</span>
                                            </div>
                                        </li>
                                        <li>
                                            <img src={location} alt="" />
                                            <div>
                                                تهران خیابان پاسداران خیابان نیستان نهم تقاطع رام پلاك ٥ کد پستی ۱۹۴۶۸۵۴۴۱۲
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div className={styles.ContactForm}>
                            <div className={styles.trapezium1}>
                                <div></div>
                                <div></div>
                                <div>
                                    <div>
                                        <h2>با ما در ارتباط باشید...</h2>
                                        <p>دوست داریم انتقادات و پیشنهاداتتون را بشنویم؛ برامون ایمیل بفرستید سریع باشما ارتباط میگیریم.</p>
                                    </div>
                                </div>
                            </div>
                            <form onSubmit={handleSubmit(submitMessage)}>
                                <div className={styles.FormContainer}>
                                    <div className={styles.LayoutInputs}>
                                        <div>
                                            <div>
                                                <label htmlFor="full_name">نام و نام خانوادگی</label>
                                                <input
                                                    className={styles.ContactInput}
                                                    id="full_name"
                                                    {...register("full_name", {
                                                        required: "نام و نام خانوادگی الزامی است",
                                                        maxLength: 20
                                                    })}
                                                    type="text"
                                                />
                                                {errors.full_name && <span role="alert" className={styles.InvalidInput}>{errors.full_name.message}</span>}
                                            </div>

                                            <div>
                                                <label htmlFor="email">آدرس پست الکترونیک</label>
                                                <input
                                                    className={styles.ContactInput}
                                                    id="email"
                                                    {...register("email", {
                                                        required: "آدرس پست الکترونیک الزامی است",
                                                    })}
                                                    type="email"
                                                />
                                                {errors.email && <span role="alert" className={styles.InvalidInput} >{errors.email.message}</span>}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label htmlFor="description">پیام</label>
                                        <textarea
                                            className={styles.MessageInput}
                                            id="description"
                                            {...register("description", {
                                                required: "پیامی در این فیلد بنویسید",
                                                maxLength: 20
                                            })}
                                            type="text-area"
                                        />
                                        {errors.description && <span role="alert" className={styles.InvalidInput}>{errors.description.message}</span>}
                                    </div>
                                    <Button id="btn_courses" type="submit">
                                        ارسال
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </>
    )
}

export default ContactUs