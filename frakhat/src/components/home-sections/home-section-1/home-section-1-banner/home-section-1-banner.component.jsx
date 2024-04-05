import { Link } from "react-router-dom"
import styles from "./home-section-1-banner.module.css"


const HomeSection1Banner = ({ data }) => {
    return (
        <div className={`${styles.banner_container}  d-flex flex-column justify-content-start align-content-center`} id={data.id}>
            <div className={styles.banner_image}>
                <img src={`https://support.frakhat.ir/${ data[data.length - 1]?.posts === undefined ? null : data[data.length - 1].posts[0].image}`} alt="" />
            </div>
            <p className={styles.banner_context}>
                <Link  to={`/mag/magDetails/${data[data.length - 1]?.posts === undefined ? null : data[data.length - 1].posts[0].id}`}>
                    {data[data.length - 1]?.posts === undefined ? null : data[data.length - 1].posts[0].summary}
                </Link>
                {/* <Link  to={`/mag/magDetails/${data[data.length - 1].title_news}`}>
                    {data[data[data.length - 1]?.posts === undefined ? null : data.length - 1].posts[0].summary}
                </Link> */}
            </p>

        </div>
    )
}

export default HomeSection1Banner;