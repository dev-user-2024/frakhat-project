import { useState, useEffect } from "react"
import HomeSection1Banner from "./home-section-1-banner/home-section-1-banner.component"
import HomeSection1NewsList from "./home-section-1-news-list/home-section-1-news-list.component"
import DateAndWeather from "./date-and-weather/date-and-weather.component"
import { api } from "../../../services";
import styles from "./home-section1.module.css"

const HomeSection1 = () => {

    const [importantNews, setImportantNews] = useState(["waiting..."])


    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/header');
            setImportantNews(data.data)
        }
        getData()
    }, [])

    return (
        <div className={`${styles.homeSection1} d-flex justify-content-between mt-5`}>
            <HomeSection1Banner className={`${styles.homeSection1_Banner}`} data={importantNews} />
            <HomeSection1NewsList className={`${styles.homeSection1_NewsList}`} data={importantNews} />
            <DateAndWeather className={`${styles.homeSection1_DateAndWeather}`} />
        </div>
    )
}

export default HomeSection1