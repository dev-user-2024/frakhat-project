import { useState, useEffect } from "react"
import SquareNewsCardVideo from "../../../UI/square-news-card-video/square-news-card-video.component"
import { api } from "../../../../services";
import TitleLine from "../../../title-line/title-line.component"
import { useMediaQuery } from 'react-responsive'
import styles from "./home-section-3-videos.module.css"

import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import 'swiper/css/scrollbar';

const HomeSection3Videos = () => {

    const [videos, setVideos] = useState([])
    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });

    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get("/section-post/Section3");
            setVideos(data.data)
        }
        getData()
    }, [])

    return (
        <div className={`${styles.home_section3_videos_container} w-100 d-flex flex-column`}>
            <TitleLine title={videos[0]?.title} />
            {
                isDesktop &&
                <div className={`${styles.home_section3_videos} d-flex justify-content-between `}>
                    {
                        videos?.map((item, index) => (
                            item?.posts.slice(-4).map((data, index) => (
                                <SquareNewsCardVideo key={index} image={`https://support.frakhat.ir/${data.image}`} title={data.title} videoUrl={`https://support.frakhat.ir/${data.video_url}`} />
                            ))
                        ))
                    }
                </div>
            }
            {
                isMobileDevice &&
                <div className={styles.sliderContainer} >
                    <Swiper
                        dir={`rtl`}
                        spaceBetween={1}
                        slidesPerView={"auto"}
                        // scrollbar={{ draggable: true }}
                        className={`mySwiper ${styles.my_Swiper}`}
                        breakpoints={{
                            // when window width is >= 640px
                            200: {
                                spaceBetween: 5,
                            },
                            // when window width is >= 768px
                            650: {
                                spaceBetween: 5,
                            },
                            1050: {
                                spaceBetween: 5,
                            },
                        }}
                    >

                        {
                            videos?.map((item, index) => (
                                item?.posts.slice(-4).map((data, index) => (
                                    <div style={{display:'flex', justifyContent: 'center', marginBottom: 20}}>
                                        <SquareNewsCardVideo key={index} image={`https://support.frakhat.ir/${data.image}`} summary={data.title} videoUrl={item.link_video} />
                                    </div>
                                ))
                            ))
                        }


                    </Swiper >


                </div>
            }



        </div>
    )
}

export default HomeSection3Videos