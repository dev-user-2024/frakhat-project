import { useState, useEffect } from "react"

import HorizontalNewsCard from "../../../UI/horizontal-news-card/horizontal-news-card.component"
import AdItem from "../../../UI/ad-item/ad-item.component"

import imgAd from '../../../../assets/images/tagsCard-img1.png'

import { api } from './../../../../services'
import TitleLine from "../../../title-line/title-line.component"
import styles from "./home-section-2-mix-news.module.css"


const HomeSection2MixNews = () => {

    const [tab, setTab] = useState("A")
    const [ads, setAds] = useState([])
    const [section2, setSection2] = useState([])
    const [addBanner, setAddBanner] = useState([])

    const shuffledBanners = addBanner.sort(() => Math.random() - 0.5);
    const randomBanners = shuffledBanners.slice(-3);

    useEffect(() => {
        (async () => {
            const { data: { data } } = await api().get('/section-post/Section2');
            setSection2(data.data);
        })()

    }, [])

    useEffect(() => {
        (async () => {
            const { data: { data } } = await api().get('/adBanners?position=section1');
            setAddBanner(data);
        })()

    }, [])

    return (
        <div className={`${styles.mix_news_container} w-100 d-flex flex-column justify-content-start`}>
            <div className={`${styles.title_links} d-flex justify-content-between`}>
                {
                    section2.map((data, index) => (
                        <TitleLine key={index} activeClass={`${tab === data.tab ? "active__tab" : ""}`} title={data.title} onChangeHandler={() => setTab(data.tab)} />
                    ))
                }

            </div>

            {
                section2.map((data, index) => {
                    if (data.tab === tab) {
                        return (
                            <div key={index} className={`${styles.mix_news} d-flex flex-column justify-content-start`}>
                                {
                                    data?.posts.slice(-3)?.map((item, index) => (
                                        <HorizontalNewsCard typeUse={'mixNews'} key={index} id={item.id} image={`https://support.frakhat.ir/${item.image}`} title={item.title} summary={''} content={item?.content} />
                                    ))
                                }
                            </div>
                        )
                    }
                })
            }
            <div className={`${styles.mix_news_ad} d-flex justify-content-between`}>
                {/* {
                    randomBanners.map(item => <AdItem image={item.image} />)
                } */}
            </div>

        </div>

    )
}

export default HomeSection2MixNews