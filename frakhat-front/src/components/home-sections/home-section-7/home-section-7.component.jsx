import { useState } from "react"
import { useMediaQuery } from 'react-responsive'
import AdList from "../home-section-2/home-section-2-ad-list/home-section-2-ad-list.component"
import TitleLine from "../../title-line/title-line.component"
import styles from "./home-section-7.module.css"

const OtherMedia = ({ title, pageUrl }) => {

    return (
        <li className={`${styles.homeSection7_otherMedia} w-100 d-flex align-items-center `}>
            <a href={pageUrl} target="blank">{title}</a>
        </li>
    )

}

const HomeSection7 = () => {

    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });

    const [isna] = useState([
        {
            title: "شایسته نیست معلمان چند شغله باشند.",
            url: "https://www.mizanonline.ir/fa/news/4715316/شایسته-نیست-معلمان-چند-شغله-باشند"
        },
        {
            title: "نشست علمی قانون گذاری بر هوش مصنوعی",
            url: "https://rc.majlis.ir/fa/news/show/1777033"
        },
        {
            title: "زنان ایرانی بسیار باهوش هستند",
            url: "https://women.gov.ir"
        },
        {
            title: "گزارش سالانه استارتاپ های ایرانی",
            url: "https://shanbemag.com/tag/گزارش-عملکرد-سالانه/"
        },

    ])
    const [farsNews] = useState([
        {
            title: "انتصاب رئیس جدید مرکز رشد واحد الکترونیکی",
            url: "https://ec.iau.ir/fa/news/688/مدیر-جدید-مرکز-رشد-واحد-الکترونیکی-منصوب-شد#:~:text=به%20گزارش%20روابط%20عمومی%20واحد,شناس%20تقدیر%20و%20تشکر%20کرد."
        },
        {
            title: "انتشار پادکست با محوریت دانش آموزان",
            url: "https://shenoto.com/channel/podcast/Frahosh"
        },
        {
            title: "کی‌یف: با تسلیحات آمریکایی به خاک روسیه حمله نمی‌کنیم",
            url: "https://www.farsnews.ir/news/14011116000902/%DA%A9%DB%8C%E2%80%8C%DB%8C%D9%81-%D8%A8%D8%A7-%D8%AA%D8%B3%D9%84%DB%8C%D8%AD%D8%A7%D8%AA-%D8%A2%D9%85%D8%B1%DB%8C%DA%A9%D8%A7%DB%8C%DB%8C-%D8%A8%D9%87-%D8%AE%D8%A7%DA%A9-%D8%B1%D9%88%D8%B3%DB%8C%D9%87-%D8%AD%D9%85%D9%84%D9%87-%D9%86%D9%85%DB%8C%E2%80%8C%DA%A9%D9%86%DB%8C%D9%85"
        },
        {
            title: "حمایت دولت سیزدهم از کسب و کارهای اینترنتی",
            url: "https://dolat.ir/detail/414191"
        },
    ])

    // useEffect(()=> {
    //     const getData = async () => {

    //         await axios.get("https://www.farsnews.ir/rss",{
    //             responseType: 'text'
    //           }).then(response=>{
    //             setTasnimNews(response.text())
    //         })
    //     }
    //     getData()
    // },[])



    return (
        <div className={`${styles.homeSection7}  d-flex flex-column mt-5`}>
            <TitleLine title="سایر رسانه‌ها" />
            <div className={`${styles.homeSection7_content} w-100 `}>

                {
                    isDesktop &&
                    <>
                        <ul className={`${styles.homeSection7_section} `}>
                            {
                                farsNews.map((item, index) => (
                                    <OtherMedia key={index} title={item.title} pageUrl={item.url} />
                                ))
                            }
                        </ul>
                        <ul className={`${styles.homeSection7_section}  `}>
                            {
                                isna.map((item, index) => (
                                    <OtherMedia key={index} title={item.title} pageUrl={item.url} />
                                ))
                            }
                        </ul>
                    </>
                }

                {
                    isMobileDevice &&
                    <div className="d-flex flex-column w-100 justify-content-center align-items-center">
                        <ul className={`${styles.homeSection7_section} w-100  d-flex flex-column justify-content-between`}>
                            {
                                farsNews.map((item, index) => (
                                    <OtherMedia key={index} title={item.title} pageUrl={item.url} />
                                ))
                            }
                        </ul>
                        <AdList />
                    </div>
                }

            </div>
        </div>
    )
}

export default HomeSection7