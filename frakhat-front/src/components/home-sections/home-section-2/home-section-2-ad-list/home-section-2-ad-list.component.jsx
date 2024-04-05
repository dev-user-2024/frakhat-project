import { useState, useEffect } from "react"
import { api } from '../../../../services'
import AdItem from "../../../UI/ad-item/ad-item.component"
import TitleLine from "../../../title-line/title-line.component"
import styles from "./home-section-2-ad-list.module.css"
import { Link } from "react-router-dom"



const AdList = () => {
    const [ads, setAds] = useState([])
    useEffect(() => {
        (async () => {
            const { data } = await api().get("/adBanners?position=sidebar");
            setAds(data.data);
        })()
    }, [])

    return (
        <div className={`${styles.ad_list_container}  d-flex flex-column `}>
            <TitleLine title="تبلیغات" />
            <div className={`${styles.ad_list}`}>
                {
                    ads.slice(-10).map((item, index) => (
                        <a key={item.id} href={item.link} target="blank">
                            <AdItem key={index} image={item.image} alt={`ad : ${item.id}`} url={item.link_url} />
                        </a>
                    ))
                }
            </div>

        </div>
    )
}

export default AdList