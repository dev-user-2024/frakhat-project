import React, { useEffect, useState } from 'react'
import styles from "./about.module.css"
import '../../components/courses-sections/courses-section-lastNews/CoursesSectionLastNew.css'
import img from '../../assets/images/about-image.png'
import miniLogo from "../../assets/images/miniLogo.svg"
import manager1 from '../../assets/images/manager1.png'
import manager2 from '../../assets/images/manager2.png'
import manager3 from '../../assets/images/manager3.png'
import manager4 from '../../assets/images/manager4.png'
import manager5 from '../../assets/images/manager5.png'
import ourColleagues1 from '../../assets/images/our-colleagues1.png'
import ourColleagues2 from '../../assets/images/our-colleagues2.png'
import ourColleagues3 from '../../assets/images/our-colleagues3.png'
import ourColleagues4 from '../../assets/images/our-colleagues4.png'
import ourColleagues5 from '../../assets/images/our-colleagues5.png'

import imageSlider1 from '../../assets/images/about-slider-1.png'
import imageSlider2 from '../../assets/images/about-slider-2.png'
import imageSlider3 from '../../assets/images/about-slider-3.png'
import imageSlider4 from '../../assets/images/about-slider-4.png'
import imageSlider5 from '../../assets/images/about-slider-5.png'
import { EffectCoverflow, Pagination, Navigation } from 'swiper';
import "../../components/courses-sections/courses-section-lastNews/CoursesSectionLastNew.css"

import 'swiper/css';
import 'swiper/css/effect-coverflow';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import { Swiper, SwiperSlide } from 'swiper/react'

const About = () => {
    const [imageSlider] = useState([imageSlider1, imageSlider2, imageSlider3, imageSlider4, imageSlider5])
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <>
            <div className={styles.AboutContainer}>
                <div>
                    <div className={styles.AboutContent} id={styles.AboutContentFirstItem}>
                        <div className={styles.AboutTitle}>
                            <img src={miniLogo} alt="" />
                            <h2>
                                درباره ما
                            </h2>
                        </div>
                        <p>
                            فراخط جمعی متشکل از دغدغه‌مندان حوزه آموزش است که در سال ۱۴۰۱ گرد هم آمده، و آغاز این استارتاپ نوپا را رقم زدند. درحال حاضر و با گذشت یک سال از فعالیت، تیم فنی مدیریت مجموعه فراخط شامل نیروهایی با تجربه در سطح بین الملل است. <br />
                            هسته اولیه فراخط در مرکز رشد دانشگاهی تشکیل شد. در این هسته ، خلاءها و ایردات سیستم آموزشی کنونی به دقت مورد بررسی قرار گرفته، و راه حل‌های موثری برای آنها طراحی شد. این راه حل ها اکنون در دستور کار مجموعه قرار گرفته‌اند تا زمانی که به پایه‌ای مستحکم در کنار سیستم آموزشی تبدیل شده و خدمتی برای تمامی دانش آموزان، دانشجویان، مربیان و آموزگاران باشند. <br />
                            اکنون با تجربیات به دست آمده در یک سال گذشته، این مجموعه در صدد است تا با برنامه ریزی دقیق و هدفمند برای آینده، راه‌های ارتباطی متعددی بین دانشگاه‌ها و صنایع مرتبط با آموزش، دانش آموزان و دانشجویان فراهم کرده، و از طریق در جهت تحقق اهداف خود قدم بردارد. در همین راستا مجموعه فراخط چندین شعبه فعال را در سراسر کشور ایجاد نموده است. <br />
                        </p>
                    </div>
                    <div className={styles.AboutImage}>
                        <img src={img} alt="" />
                    </div>
                </div>
                <Swiper
                    effect={'coverflow'}
                    grabCursor={true}
                    centeredSlides={true}
                    loop={true}
                    slidesPerView={'auto'}
                    coverflowEffect={{
                        rotate: 0,
                        stretch: 0,
                        depth: 100,
                        modifier: 2.5,
                    }}
                    pagination={{ el: '.swiper-pagination', clickable: true }}
                    navigation={{
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                        clickable: true,
                    }}
                    modules={[EffectCoverflow, Pagination, Navigation]}
                    className="swiper_container"
                >
                    {imageSlider?.map((item, i) => (
                        <SwiperSlide className='about-slider' key={i} style={{ width: 400, height: 328 }}>
                            <img src={item} alt="slide_image" />
                            <div>
                                <h4></h4>
                            </div>
                        </SwiperSlide>
                    ))}

                </Swiper>
                <div>
                    <div className={styles.managerContainer}>
                        <div className={styles.AboutTitle}>
                            <img src={miniLogo} alt="" />
                            <h2>
                                معرفی مدیران
                            </h2>
                        </div>
                        <div className={styles.managers}>
                            <div>
                                <img src={manager1} alt="" />
                                <h4>محمد خلجی</h4>
                                <p>Co-founder</p>
                            </div>
                            <div>
                                <img src={manager2} alt="" />
                                <h4>سعید سورانی</h4>
                                <p>CEO</p>
                            </div>
                            <div>
                                <img src={manager3} alt="" />
                                <h4>سمانه حبیبی</h4>
                                <p>CDO</p>
                            </div>
                            <div>
                                <img src={manager4} alt="" />
                                <h4>زهرا ارشیا</h4>
                                <p>CTO</p>
                            </div>
                            <div>
                                <img src={manager5} alt="" />
                                <h4>مطهره جان نثاری</h4>
                                <p>Head Of SEO</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div className={styles.AboutContent}>
                        <div className={styles.AboutTitle}>
                            <img src={miniLogo} alt="" />
                            <h2>
                                هدف ما
                            </h2>
                        </div>
                        <p>
                            در طول روز اطلاعات مختلف و درست و غلطی در اختیار خودآگاه و ناخودآگاه ما قرار می‌گیرد. اما صحت و سلامت این اطلاعات نامشخص است. مجله فراخط، با هدف قراردادن اطلاعات عمومی صحیح و مفید در اختیار مخاطبان آن، راه اندازی شده و فعالیت خود را آغاز نموده است. در کنار این اطلاعات عمومی، حوزه آموزش نیز اهمیت بخصوصی برای مجموعه دارد. به همین دلیل در مجله فراخط، قسمتی به آموزش در زمینه‌های مختلف و با متدهای روز دنیا اختصاص داده شده است. <br />
                            هر یک از این دوره‌ها مبتنی بر نیازهای مهارتی و دانشی افراد و بخصوص دانش آموزان و دانشجویان طراحی شده‌اند. از این رو یکی دیگر از دستاوردهای مجله فراخط، آماده‌سازی نیروهای جوان و مهارت‌آموزی به آنان جهت ورود به بازار مشاغل است. <br />
                            بخش دیگری از دوره‌ها به منظور افزایش آگاهی عمومی جوانان در حوزه‌های مختلف آماده‌سازی شده‌اند. سرفصل‌های این دسته از دوره‌ها متناسب با چالش‌ها، پرسش‌ها و دانش عمومی است که هر فرد در ارتباط با محیط و جامعه خود به آنها نیازمند است. <br />
                            در قسمت مجله، اطلاعات و اخبار به صورت دسته بندی شده ارائه شده‌اند. این مطالب برگرفته از مابع معتبر داخلی گردآوری می‌شوند. <br />
                            در بخش آموزشی وبسایت فراخط، دوره‌های کاربردی و هدفمند معرفی شده‌اند که اساتید مربوط به هر یک، دارای تجارب موفق بین الملل و داخل کشورد هستند. دوره‌های گفته شده، با در نظر گرفتن بازه سنی مخاطبان آماده شده‌اند.
                        </p>
                    </div>
                </div>
                <div>
                    <div className={styles.ourColleaguesContainer}>
                        <div className={styles.AboutTitle}>
                            <img src={miniLogo} alt="" />
                            <h2>
                                همکاران ما
                            </h2>
                        </div>
                        <div className={styles.ourColleagues}>
                            <div>
                                <img src={ourColleagues1} alt="" />
                                <h4>دانشگاه آزاد اسلامی</h4>
                            </div>
                            <div>
                                <img src={ourColleagues2} alt="" />
                                <h4>مرکز رشد واحد الکترونیکی</h4>
                            </div>
                            <div>
                                <img src={ourColleagues3} alt="" />
                                <h4>ریاست جمهوری معاونت علم و فناوری</h4>
                            </div>
                            <div>
                                <img src={ourColleagues4} alt="" />
                                <h4>خانه های خلاق و نوآوری ایران</h4>
                            </div>
                            <div>
                                <img src={ourColleagues5} alt="" />
                                <h4>فراهوش</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div className={styles.AboutContent}>
                        <div className={styles.AboutTitle}>
                            <img src={miniLogo} alt="" />
                            <h2>
                                رویکرد ما
                            </h2>
                        </div>

                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br /> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی.
                            .
                        </p>
                    </div>
                </div>
            </div>
        </>
    )
}

export default About