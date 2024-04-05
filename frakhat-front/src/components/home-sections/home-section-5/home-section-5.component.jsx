import { useState, useEffect } from "react"
import { Link } from "react-router-dom"
import { api } from "../../../services";
import TitleLine from "../../title-line/title-line.component"
import { useMediaQuery } from 'react-responsive'
import NewsPaper from "../../UI/news-paper/news-paper.component"
import styles from "./home-section-5.module.css"


const GallerySection = ({ imageSrc, column, row, id }) => {
    return (
        <div className={`${styles.gallery_section} ${styles[column]} ${styles[row]}`}>
            <div className={`${styles.gallery_item}`}>
                <div className={`${styles.image}`}>
                    <Link to={`/mag/galleryDetails/${id}`}>
                        <img src={imageSrc} alt="" />
                    </Link>
                </div>
            </div>
        </div>
    )
}
const HomeSection5 = () => {
    const isMobileDevice = useMediaQuery({
        query: "(max-width: 1200px)",
    });

    const isDesktop = useMediaQuery({
        query: "(min-width: 1200px)",
    });
    const [imagesData, setImagesData] = useState([])

    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/Section5');
            setImagesData(data.data);
        }
        getData()
    }, [])
 
    return (
        <div className={`${styles.HomeSection5} d-flex flex-column justify-content-center align-items-start mt-5`}>
            {
                isDesktop &&
                <>
                    <TitleLine title={imagesData[0]?.title} />
                    <div className={`${styles.gallery_container} `}>
                        {
                            imagesData[0]?.posts.slice(-10).map((item, index) => (
                                <GallerySection key={index} imageSrc={`https://support.frakhat.ir/${item?.image}`} id={item.id} />
                            ))
                        }
                    </div>
                </>
            }
            {
                isMobileDevice &&
                <>
                    <TitleLine title="تصاویر" />
                    <div className={`${styles.gallery_container} `}>
                        {
                            imagesData[0]?.posts.slice(-10).map((item, index) => (
                                <GallerySection key={index} imageSrc={`https://support.frakhat.ir/${item?.image}`} id={item.id} />
                            ))
                        }
                    </div>
                    <div className={`${styles.newsPaper_section} `} >
                    <NewsPaper />
                    </div>
                </>
            }
        </div>
    )
}
export default HomeSection5