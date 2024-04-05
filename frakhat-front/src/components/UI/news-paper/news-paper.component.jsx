import { useState, useEffect } from "react"
import TitleLine from "../../title-line/title-line.component"
import { useMediaQuery } from 'react-responsive'

// import { ReactComponent as NextNewsIcon } from "../../../assets/icons/news-paper-button-next.svg"
// import { ReactComponent as BackNewsIcon } from "../../../assets/icons/news-paper-button-back.svg"

import styles from "./news-paper.module.css"

// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/effect-flip";
import "swiper/css/pagination";
import "swiper/css/navigation";


// import required modules
import { EffectFlip, Pagination, Navigation } from "swiper";



const NewsPaper = () => {

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });


    // const [newsPaper, setNewsPaper] = useState(["waiting..."])


    useEffect(() => {
        // axios.get("").then((response) => {
        // })
    }, [])


    return (
        <div className={`${styles.news_Paper_container} d-flex flex-column justify-content-start`}>
            {/* <TitleLine title="گیشه روزنامه" />

            {
                isDesktop &&
                <Swiper
                    effect={"flip"}
                    grabCursor={true}
                    pagination={true}
                    navigation={true}
                    modules={[EffectFlip, Pagination, Navigation]}
                    className={styles.mySwiper}
                >
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-5.jpg" alt="" />
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" alt="" />
                    </SwiperSlide>
                </Swiper>
            }

            {
                isMobileDevice &&
                <Swiper
                    dir={`rtl`}
                    spaceBetween={35}
                    slidesPerView={"auto"}
                    className={`mySwiper ${styles.my_Swiper}`}
                    breakpoints={{
                        // when window width is >= 640px
                        200: {
                            spaceBetween: 20,
                        },
                        // when window width is >= 768px
                        650: {
                            spaceBetween: 25,
                        },
                        1050: {
                            spaceBetween: 30,
                        },
                    }}
                >


                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>
                    <SwiperSlide className={styles.SwiperSlide}>
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" alt="" />
                        <p className="text-center mt-3">روزنامه کیهان</p>
                    </SwiperSlide>


                </Swiper >
            } */}


        </div>
    )
}

export default NewsPaper