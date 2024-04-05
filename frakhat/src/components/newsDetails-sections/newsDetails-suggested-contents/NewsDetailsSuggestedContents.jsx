import { useState, useEffect } from "react"
import TitleLine from '../../title-line/title-line.component'
import AdItem from '../../UI/ad-item/ad-item.component'
import styles from './newsDetailsSuggestedContents.module.css'




const NewsDetailsSuggestedContents = () => {

    const [suggestToday, setSuggestToday] = useState(["در حال دریافت اطلاعات"])
    return (
        <div className={`${styles.newsDetails_suggested_contents} d-flex flex-column`}>
            <TitleLine title="مطالب پیشنهادی روز" />
            <div className={`${styles.newsDetails_suggested_contents_item} d-flex`}>
                {
                    suggestToday.slice(-4).map((item, index) => (
                        <AdItem key={index} image={`https://app.frakhat.ir/image/news/original/${item.thumbnail_news}`} alt={item.title_news} url={`/mag/magDetails/${item.title_news}`} />
                    ))

                }
            </div>
            <div className={`${styles.newsDetails_suggested_contents_item} d-flex`}>
                {
                    suggestToday.slice(-6, -4).map((item, index) => (
                        <AdItem key={index} styleType="tall_ad_newsDetails" image={`https://app.frakhat.ir/image/news/original/${item.thumbnail_news}`} alt url={`/mag/magDetails/${item.title_news}`} />
                    ))

                }
            </div>
            <div className={`${styles.newsDetails_suggested_contents_item} d-flex`}>
                {
                    suggestToday.slice(-10,-6).map((item, index) => (
                        <AdItem key={index} styleType="fat_ad_newsDetails" image={`https://app.frakhat.ir/image/news/original/${item.thumbnail_news}`} alt url={`/mag/magDetails/${item.title_news}`} />
                    ))

                }
                {/* <AdItem styleType="fat_ad_newsDetails" image={img1} alt url="" />
                <AdItem styleType="fat_ad_newsDetails" image={img1} alt url="" />
                <AdItem styleType="fat_ad_newsDetails" image={img1} alt url="" />
                <AdItem styleType="fat_ad_newsDetails" image={img1} alt url="" /> */}

            </div>

        </div>
    )
}

export default NewsDetailsSuggestedContents