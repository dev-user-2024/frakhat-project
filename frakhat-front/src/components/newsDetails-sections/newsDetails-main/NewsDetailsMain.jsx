import DOMPurify from "dompurify";
import parse from "html-react-parser";
import styles from "./newsDetailsMain.module.css"

import categoryIcon from '../../../assets/icons/newsDetails-category.svg'
import clockIcon from '../../../assets/icons/newsDetails-clock.svg'
import shareIcon from '../../../assets/icons/newsDetails-share.svg'
import moment from "moment";

const NewsDetailsMain = ({ news, category }) => {
    const contentNews = DOMPurify.sanitize(news.content, {
        USE_PROFILES: { html: true },
    });

    return (
        <div className={`${styles.news_Details_Main} d-flex mt-5`}>
            <div className={styles.news_Details_img}>
                <img src={`https://support.frakhat.ir/${news.image}`} alt={news.title} />
            </div>

            <div className={`${styles.news_Details_content} d-flex `}>

                <h1>{news.title}</h1>

                <div className={`${styles.news_Details_info} d-flex justify-content-between align-items-cneter`}>
                    <div className={`${styles.news_Details_info_section1} d-flex`}>
                        <div>
                            <img src={categoryIcon} alt="category" />
                            <span>{category}</span>
                        </div>
                        <div>
                            <img src={clockIcon} alt="category" />
                            <span>ساعت {moment(news.created_at).format('HH:mm')}</span>
                        </div>
                    </div>
                    <div>
                        <img src={shareIcon} alt="" />
                        <span>اشتراک گذاری با دیگران</span>
                    </div>
                </div>

                <div>{parse(contentNews)}</div>
            </div>

        </div>
    )
}

export default NewsDetailsMain