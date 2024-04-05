import { useState, useEffect } from "react"
import SquareNewsCard from "../../../UI/square-news-card/square-news-card.component"
import TitleLine from "../../../title-line/title-line.component"
import { useMediaQuery } from 'react-responsive'
import { api } from './../../../../services'
import styles from "./home-section-2-chosen.module.css"

import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import 'swiper/css/scrollbar';

const HomeSection2Chosen = () => {

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });

    const [section1, setSection1] = useState([])


    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/Section1');
            setSection1(data.data[0])
        }
        getData()
    }, [])
    return (
        <div className={`${styles.chosen} d-flex flex-column`}>
            <TitleLine title={section1?.title} />
            {

                <>
                    <div className={`${styles.chosen_cards} d-flex justify-content-between align-items-start`} style={{ flexWrap: 'wrap', justifyContent: 'center' }}>
                        {
                            section1?.posts === undefined ? null : section1?.posts.slice(-6).map((item, index) => (
                                <span key={index}>
                                    <SquareNewsCard classType="card_container-big" key={index} id={item.id} image={`https://support.frakhat.ir/${item.image}`} title={item.title} summary={item.summary} content={item.content} date={item.date} time={item.time} />
                                </span>
                            ))
                        }

                    </div>
                    
                </>
            }

        </div>
    )
}

export default HomeSection2Chosen;