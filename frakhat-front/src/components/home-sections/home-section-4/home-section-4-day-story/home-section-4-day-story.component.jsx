import { useState, useEffect } from "react"
import SquareNewsCard from "../../../UI/square-news-card/square-news-card.component"
import TitleLine from "../../../title-line/title-line.component"
import { useMediaQuery } from 'react-responsive'
import { api } from "../../../../services";
import styles from "./home-section-4-day-story.module.css"


//slider import 
// import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import 'swiper/css/scrollbar';


const HomeSection4DayStory = () => {
    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });

    const [section4, setSection4] = useState(["waiting..."]);

    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/Section4');
            setSection4(data.data);
        }
        getData()
    }, [])

    return (
        <div className={`${styles.day_story_container} w-100 d-flex flex-column`}>
            <TitleLine title={section4[0]?.title} />
                <div className={`${styles.home_section4} d-flex flex-column justify-content-between `}>
                    <div className={`${styles.chosen_cards} d-flex justify-content-between align-items-start`}>
                        {
                            section4[0]?.posts === undefined ? null : section4[0]?.posts.slice(-4).map((item, index) => {
                                return (
                                    <span key={index}>
                                        <SquareNewsCard classType="card_container-big" id={item.id} key={index} image={`https://support.frakhat.ir/${item.image}`} title={item.title} summary={item.summary} date={item.created_at} time={item.time} />
                                    </span>
                                )
                            })
                        }
                    </div>
                    <div className={`${styles.chosen_cards} d-flex justify-content-between align-items-start`}>
                        {
                            section4[0]?.posts === undefined ? null : section4[0]?.posts.slice(-9,-4).map((item, index) => {
                                return (
                                    <span key={index}>
                                        <SquareNewsCard classType="card_container-small" id={item.id} key={index} image={`https://support.frakhat.ir/${item.image}`} title={item.title} summary={item.summary} date={item.created_at} time={item.time}  />
                                    </span>
                                )
                            })
                        }
                    </div>

                </div>
        </div>
    )
}

export default HomeSection4DayStory