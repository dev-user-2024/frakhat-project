import HomeSection2Chosen from "./home-section-2-chosen/home-section-2-chosen.component"
import HomeSection2MixNews from "./home-section-2-mix-news/home-section-2-mix-news.component"
import AdList from "./home-section-2-ad-list/home-section-2-ad-list.component"

import NewsPaper from "../../UI/news-paper/news-paper.component"
import { useMediaQuery } from 'react-responsive'

import styles from "./home-section-2.module.css"

const HomeSection2 = () => {

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });

    return (
        <>
            {
                isDesktop &&
                <div className={`${styles.homeSection2} d-flex justify-content-between mt-5`}>
                    <div className={`${styles.homeSection2_main_container} d-flex flex-column `}>
                        <HomeSection2Chosen />
                        <HomeSection2MixNews />
                    </div>
                    <aside className={`${styles.homeSection2_aside_container} d-flex flex-column`}>
                        <AdList />
                        <NewsPaper />
                    </aside>
                </div>
            }

            {
                isMobileDevice && 
                <div className={`${styles.homeSection2} d-flex justify-content-between mt-5`}>
                    <div className={`${styles.homeSection2_main_container} d-flex flex-column `}>
                        <HomeSection2Chosen />
                        <HomeSection2MixNews />
                    </div>
                    
                </div>
            }
        </>
    )
}

export default HomeSection2