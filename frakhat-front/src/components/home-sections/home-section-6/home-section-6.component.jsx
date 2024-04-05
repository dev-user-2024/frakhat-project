import { useState, useEffect } from "react"
import { api } from "../../../services";
import NewsCardMultiTitle from "../../UI/news-card-multi-title/news-card-multi-title.component"
import styles from "./home-section-6.module.css"

const HomeSection6 = () => {
    const [section6, setSection6] = useState([])
    const [section7, setSection7] = useState([])
    const [section8, setSection8] = useState([])

    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/Section6');
            setSection6(data.data)
        }
        getData()
    }, [])

    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/Section7');
            setSection7(data.data)
        }
        getData()
    }, [])

    useEffect(() => {
        const getData = async () => {
            const { data: { data } } = await api().get('/section-post/Section8');
            setSection8(data.data)
        }
        getData()
    }, [])


    return (
        <div className={`${styles.HomeSection6} d-flex flex-column justify-content-center align-items-start mt-5`}>
            <div className={`${styles.HomeSection6_section} w-100 d-flex  justify-content-between align-items-start`}>
                {
                    section6.map((data, index) => (
                        <NewsCardMultiTitle key={index} id="socialNews" headerTitle={data.title} data={data.posts} />
                    ))
                }
            </div>

            <div className={`${styles.HomeSection6_section} w-100 d-flex  justify-content-between align-items-start`}>
                {
                    section7.map((data, index) => (
                        <NewsCardMultiTitle key={index} id="socialNews" headerTitle={data.title} data={data.posts} />
                    ))
                }
            </div>

            <div className={`${styles.HomeSection6_section} w-100 d-flex  justify-content-between align-items-start`}>
                {
                    section8.map((data, index) => (
                        <NewsCardMultiTitle key={index} id="scientificNews" headerTitle={data.title} data={data.posts} />
                    ))
                }
            </div>
        </div>

    )
}
export default HomeSection6