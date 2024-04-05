import HorizontalNewsCard from "../../../UI/horizontal-news-card/horizontal-news-card.component"
import styles from "./home-section-1-news-list.module.css"


const HomeSection1NewsList = ({ data }) => {
    return (
        <div className={`${styles.nesw_list_container}  d-flex flex-column`}>
            {
                data[0]?.posts === undefined ? null : data[0].posts.slice(-7, -2).map((item, index) => (
                    <HorizontalNewsCard key={index} id={item.id} typeUse="imgSmall" image={`https://support.frakhat.ir/${item.image}`} content={''} title={item.title} summary={item.summary} />
                ))
            }
        </div>

    )
}

export default HomeSection1NewsList;