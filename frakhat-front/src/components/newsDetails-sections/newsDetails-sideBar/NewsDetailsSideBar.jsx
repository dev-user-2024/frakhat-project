import { useState, useEffect } from "react"
import { api } from './../../../services'
import { useMediaQuery } from 'react-responsive'
import TitleLine from "../../title-line/title-line.component"
import NewsDetailsSquareNewsCard from "../../UI/newsDetails-square-news-card/NewsDetailsSquareNewsCard"
import AdItem from "../../UI/ad-item/ad-item.component"

import styles from "./newsDetailsSideBar.module.css"

//slider import 
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import 'swiper/css/scrollbar';


const NewsDetailsSideBar = () => {

  const [visitedNews, setVisitedNews] = useState(["جزییات ..."])
  const [recommended, setRecommended] = useState([])
  const [sidebarAd, setSidebarAd] = useState([])

  const isMobileDevice = useMediaQuery({
    query: "(max-width: 1200px)",
  });

  const isDesktop = useMediaQuery({
    query: "(min-width: 1200px)",
  });

  useEffect(() => {
    (async () => {
      const { data: { data } } = await api().get('/adBanners?position=nearCourse')
      setSidebarAd(data);
    })()
  }, [])

  return (
    <aside className={`${styles.news_details_sideBar} d-flex justify-content-between mt-5`}>

      <div className={`${styles.news_details_sideBar_item} d-flex flex-column`}>
        <TitleLine title="پربازدیدترین‌ها" />

        {
          isMobileDevice &&

          <div className={styles.sliderContainer} >
            <Swiper
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
                visitedNews.map((item, index) => (
                  <SwiperSlide className={styles.swiper_slide}>
                    <NewsDetailsSquareNewsCard key={index} imageSrc={`https://support.frakhat.ir${item.thumbnail_news}`} title={item.title_news} />
                  </SwiperSlide>
                ))
              }
            </Swiper >
          </div>
        }

        {isDesktop &&
          visitedNews.slice(-3).map((item, index) => (
            <NewsDetailsSquareNewsCard key={index} imageSrc={`https://support.frakhat.ir${item.thumbnail_news}`} title={item.title_news} />
          ))
        }

      </div>

      <div className={`${styles.news_details_sideBar_item} d-flex flex-column`}>
        <TitleLine title="توصیه‌شده‌ها" />

        {
          recommended.slice(-3).map((item, index) => (
            <NewsDetailsSquareNewsCard key={index} imageSrc={`https://support.frakhat.ir/${item.thumbnail_news}`} title={item.title_news} />
          ))
        }

      </div>

      <div className={`${styles.news_details_sideBar_item} d-flex flex-column`}>
        <TitleLine title="تبلیغات" />
        {
          sidebarAd.slice(-3).map((item, index) => (
            <a key={item.id} href={item.link} target="blank">
              <AdItem key={index} styleType="newsDetails_sidebar_ad" image={item.image} url={item.link_url} />
            </a>
          ))
        }
      </div>

    </aside>
  )
}

export default NewsDetailsSideBar