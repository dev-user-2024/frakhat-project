import { Link, useLocation } from "react-router-dom"
import styles from "./footer.module.css"
import Logo from "../../assets/images/nav-logo.png"
import facebookIcon from '../../assets/icons/facebook-footer.svg'
import instagramIcon from '../../assets/icons/instagram-footer.svg'
import twitterIcon from '../../assets/icons/twitter-footer.svg'
import linkedinIcon from '../../assets/icons/linkedin-footer.svg'
import faniLogo from '../../assets/images/fani-logo.png'
import locationIcon from '../../assets/icons/location-footer.svg'
import callIcon from '../../assets/icons/call-footer.svg'

import { useForm } from "react-hook-form"
import { api } from "../../services"
import { errorAlert, successAlert } from "../../providers/AlertServiceProvider"

import logo1 from '../../assets/images/footer-logo1.png'
import logo3 from '../../assets/images/footer-logo3.png'
import logo4 from '../../assets/images/footer-logo4.png'
import logo5 from '../../assets/images/footer-logo5.png'
import logo6 from '../../assets/images/footer-logo6.png'
import { useEffect, useState } from "react"

const AnyReactComponent = ({ text }) => <div>{text}</div>;

const Footer = () => {
    const [courses, setCourses] = useState([])

    useEffect(() => {
        (async () => {
            const { data: { data } } = await api().get('/course_list');
            setCourses(data);
        })()
    }, [])

    const location = useLocation();

    const { register, handleSubmit } = useForm()

    return (
        <>
            {
                location.pathname.split('/')[1] === 'mag' ?
                    <footer className={`${styles.footer_container} d-flex mt-5 justify-content-center`}>
                        <div className={`${styles.footer_messengers} d-flex justify-content-between m-3 `}>
                            <a href="">
                                <img src={facebookIcon} alt="facebook" />
                            </a>
                            <a href="">
                                <img src={instagramIcon} alt="instagram" />
                            </a>
                            <a href="">
                                <img src={twitterIcon} alt="twitter" />
                            </a>
                            <a href="">
                                <img src={facebookIcon} alt="facebook" />
                            </a>
                        </div>
                    </footer>
                    : location.pathname.split('/')[1] === 'courses' ?
                        <footer className={`${styles.footer_container} d-flex mt-5`}>
                            <div className={`${styles.footer}  d-flex`}>
                                <div>
                                    <div>
                                        <div className={styles.social}>
                                            <div className={`${styles.footer_logo} d-flex col-4 justify-content-start align-items-center`}>
                                                <img src={Logo} alt="logo" />
                                                <p>فراخط</p>
                                            </div>
                                            <div className={styles.paragraph}>
                                                <p>هسته اولیه فراخط در مرکز رشد دانشگاهی تشکیل شد. در این هسته ، خلاءها و ایردات سیستم آموزشی کنونی به دقت مورد بررسی قرار گرفته، و راه حل‌های موثری برای آنها طراحی شد. این راه حل ها اکنون در دستور کار مجموعه قرار گرفته‌اند تا زمانی که به پایه‌ای مستحکم در کنار سیستم آموزشی تبدیل شده و خدمتی برای تمامی دانش آموزان، دانشجویان، مربیان و آموزگاران باشند.</p>
                                            </div>
                                            <div className={`${styles.address} `}>
                                                <div>
                                                    <img src={locationIcon} alt="location icon" />
                                                    <p>تهران خیابان پاسداران خیابان نیستان نهم تقاطع رام پلاك ٥ کد پستی ۱۹۴۶۸۵۴۴۱۲</p>
                                                </div>
                                                <div>
                                                    <img src={callIcon} alt="call icon" />
                                                    <p>۲۱۹۱۶۹۲۰۶۵</p>
                                                    <p>۲۱۴۲۸۶۳۰۰۰ داخلی ۷۸۴</p>
                                                </div>
                                            </div>
                                            <div className={`${styles.footer_messengers} d-flex `}>
                                                <a href="">
                                                    <img src={facebookIcon} alt="facebook" />
                                                </a>
                                                <a href="">
                                                    <img src={instagramIcon} alt="instagram" />
                                                </a>
                                                <a href="">
                                                    <img src={twitterIcon} alt="twitter" />
                                                </a>
                                                <a href="">
                                                    <img src={linkedinIcon} alt="facebook" />
                                                </a>
                                            </div>
                                        </div>
                                        <div className={styles.mainSection}>
                                            <div>
                                                <h5>دسترسی</h5>
                                                <p>
                                                    <Link to={''}>خانه</Link>
                                                </p>
                                                <p>
                                                    <Link to={'/courses'}>
                                                        دوره‌های
                                                    </Link>
                                                </p>
                                                <p>
                                                    <Link to={'/jobs-landing'}>
                                                        کاریابی
                                                    </Link>
                                                </p>
                                                <p>
                                                    <Link to={'/about'}>
                                                        مجله خبری
                                                    </Link>
                                                </p>
                                                <p>
                                                    <Link to={'/about'}>
                                                        درباره ما
                                                    </Link>
                                                </p>
                                                <p>
                                                    <Link to={'/contact-us'}>
                                                        تماس با ما
                                                    </Link>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div >

                                    </div>
                                </div>
                                <div className={styles.confirmation}>
                                    <h5>تاییدیه‌ها</h5>
                                    <div>
                                        <a>
                                            <img src={logo1} alt="" />
                                        </a>
                                        <a href="https://qr.mojavez.ir/track/2412821" target="_blank" rel="noreferrer">
                                            <img src={faniLogo} alt="" />
                                        </a>
                                        <a>
                                            <img src={logo3} alt="" />
                                        </a>
                                        <a>
                                            <img src={logo4} alt="" />
                                        </a>
                                        <a>
                                            <img src={logo5} alt="" />
                                        </a>
                                        <a>
                                            <img src={logo6} alt="" />
                                        </a>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </footer >
                        :
                        <>
                            <footer className={`${styles.footer_container} d-flex mt-5`}>
                                <div className={`${styles.footer}  d-flex`}>
                                    <div>
                                        <div>
                                            <div className={styles.social}>
                                                <div className={`${styles.footer_logo} d-flex col-4 justify-content-start align-items-center`}>
                                                    <img src={Logo} alt="logo" />
                                                    <p>فراخط</p>
                                                </div>
                                                <div className={styles.paragraph}>
                                                    <p>هسته اولیه فراخط در مرکز رشد دانشگاهی تشکیل شد. در این هسته ، خلاءها و ایردات سیستم آموزشی کنونی به دقت مورد بررسی قرار گرفته، و راه حل‌های موثری برای آنها طراحی شد. این راه حل ها اکنون در دستور کار مجموعه قرار گرفته‌اند تا زمانی که به پایه‌ای مستحکم در کنار سیستم آموزشی تبدیل شده و خدمتی برای تمامی دانش آموزان، دانشجویان، مربیان و آموزگاران باشند.</p>
                                                </div>
                                                <div className={`${styles.address} `}>
                                                    <div>
                                                        <img src={locationIcon} alt="location icon" />
                                                        <p>تهران خیابان پاسداران خیابان نیستان نهم تقاطع رام پلاك ٥ کد پستی ۱۹۴۶۸۵۴۴۱۲</p>
                                                    </div>
                                                    <div>
                                                        <img src={callIcon} alt="call icon" />
                                                        <p>۲۱۹۱۶۹۲۰۶۵</p>
                                                        <p>۲۱۴۲۸۶۳۰۰۰ داخلی ۷۸۴</p>
                                                    </div>
                                                </div>
                                                <div className={`${styles.footer_messengers} d-flex `}>
                                                    <a href="">
                                                        <img src={facebookIcon} alt="facebook" />
                                                    </a>
                                                    <a href="">
                                                        <img src={instagramIcon} alt="instagram" />
                                                    </a>
                                                    <a href="">
                                                        <img src={twitterIcon} alt="twitter" />
                                                    </a>
                                                    <a href="">
                                                        <img src={linkedinIcon} alt="facebook" />
                                                    </a>
                                                </div>

                                                <div className={styles.confirmation2}>
                                                    <h5>تاییدیه‌ها</h5>
                                                    <div>
                                                        <a>
                                                            <img src={logo1} alt="" />
                                                        </a>
                                                        <a href="https://qr.mojavez.ir/track/2412821" target="_blank" rel="noreferrer">
                                                            <img src={faniLogo} alt="" />
                                                        </a>
                                                        <a>
                                                            <img src={logo3} alt="" />
                                                        </a>
                                                        <a>
                                                            <img src={logo4} alt="" />
                                                        </a>
                                                        <a>
                                                            <img src={logo5} alt="" />
                                                        </a>
                                                        <a>
                                                            <img src={logo6} alt="" />
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className={styles.contact_form}>
                                        <div className={styles.form_title}>
                                            <h1>ارتباط با <span>فراخط</span></h1>
                                        </div>
                                        <form >
                                            <div>
                                                <label htmlFor="name">نام و نام خانوادگی</label>
                                                <input id="name" type="text" />
                                            </div>
                                            <div>
                                                <label htmlFor="call">شماره تلفن</label>
                                                <input id="call" type="number" />
                                            </div>
                                            <div>
                                                <label htmlFor="name">آدرس ایمیل</label>
                                                <input id="name" type="text" />
                                            </div>
                                            <div>
                                                <label htmlFor="course">دوره مدنظر</label>
                                                <select name="course" id="course_id" {...register("course_id")}>
                                                    {
                                                        courses?.map(item => (
                                                            <option key={item.id} value={`${item.title_course}`}>{item.title_course}</option>
                                                        ))
                                                    }
                                                </select>
                                            </div>
                                            <div>
                                                <label htmlFor="message">دوره مدنظر</label>
                                                <textarea name="" id="message" cols="30" rows="7"></textarea>
                                            </div>
                                            <div className={styles.form_button}>
                                                <button>ارسال پیام</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </footer >
                        </>
            }
            <div className={styles.law}>
                <p>کلیه حقوق مادی و معنوی این وبسایت متعلق به تیم فراخط می‌باشد</p>
            </div>
        </>
    )
}

export default Footer

