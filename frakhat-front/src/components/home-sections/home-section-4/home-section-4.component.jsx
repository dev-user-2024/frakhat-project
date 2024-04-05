import { useState, useEffect } from "react"
import { api } from "../../../services";
import HomeSection4DayStory from "./home-section-4-day-story/home-section-4-day-story.component"
import AdItem from "../../UI/ad-item/ad-item.component"
import styles from "./home-section-4.module.css"
import image from '../../../assets/images/CourseDetail-banner.png'


const HomeSection4 = () => {
    const [ads, setAds] = useState([])
    const [addBanner, setAddBanner] = useState([])
    useEffect(() => {
        (async () => {
            const { data: { data } } = await api().get('/adBanners?position=section2');
            setAddBanner(data);
        })()

    }, [])

    return (
        <div className={`${styles.homeSection4} d-flex flex-column justify-content-between mt-5`}>
            <HomeSection4DayStory />
            <div className={`${styles.mix_news_ad} d-flex justify-content-between`}>

                {
                    ads.slice(-4).map((item, index) => (
                        <AdItem key={index} image={item.image_url} alt={`ad : ${item.id}`} url={item.link_url} styleType="tall_ad" />
                    ))
                }
                {/* {
                    addBanner.slice(-3).map(item => <AdItem image={item.image} />)
                } */}
            </div>
        </div>
    )
}

export default HomeSection4