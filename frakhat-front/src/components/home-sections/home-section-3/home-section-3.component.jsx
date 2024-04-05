import { useState } from "react"
import HomeSection3Videos from "./home-section-3-videos/home-section-3-videos.component"

import TitleLine from "../../title-line/title-line.component"

import styles from "./home-section-3.module.css"

import Img1 from "../../../assets/images/author-img-1.png"
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Autoplay, Pagination } from 'swiper';
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import 'swiper/css/scrollbar';


const HomeSection3 = () => {

    const [newsWriter, setNewsWriter] = useState([
        {},
        {},
        {},
        {},
    ])

    return (
        <div className={`${styles.homeSection3} d-flex justify-content-between mt-5`}>
            <div className={`${styles.homeSection3_main_container} d-flex flex-column `}>
                <HomeSection3Videos />
            </div>
            <aside className={`${styles.homeSection3_aside_container} d-flex flex-column align-items-center`}>
                <TitleLine title="از زبان نویسنده‌ها" />

                <div className={styles.swiper_container}>
                    <Swiper
                        spaceBetween={30}
                        centeredSlides={true}
                        autoplay={{
                            delay: 2500,
                            disableOnInteraction: false,
                        }}
                        modules={[Autoplay, Pagination, Navigation]}
                        className={`${styles.mySwiper}`}
                        style={{
                            width: "100%",
                            height: "200px",
                            backgroundColor: "white",
                            borderRadius: 10,
                        }}
                    >
                        {
                            newsWriter.map((item, index) => (
                                <SwiperSlide key={index}><img style={{ height: '100%', width: '100%' }} src={Img1} alt="" /></SwiperSlide>
                            ))
                        }
                    </Swiper>
                </div>
            </aside>
        </div>
    )
}

export default HomeSection3