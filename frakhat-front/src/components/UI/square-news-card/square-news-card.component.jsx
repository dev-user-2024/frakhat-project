import { Link } from "react-router-dom";
import { motion } from "framer-motion"
import styles from "./square-news-card.module.css"
import moment from "moment-jalaali";

const SquareNewsCard = ({ image, id, title, summary, date, time, classType }) => {
    let momentTime = moment("2023-06-15T15:51:49.000000Z", date);
    return (
        <motion.div whileHover={{ scale: 1.07 }} className={`${styles[classType]} d-flex flex-column justify-content-start align-items-start`}>
            <img src={image} alt="" className={styles.card_image} />
            <Link to={`/mag/magDetails/${id}`}>
                <div className={`${styles.card_context} d-flex flex-column justify-content-start align-items-start`}>
                    <h3>{title.length > 35 ? title.slice(0, 35) + "..." : title}</h3>
                    <p>{summary.length > 70 ? summary.slice(0, 70) + "..." : summary}</p>
                    
                </div>
            </Link>
            <div className={`${styles.card_Time_information} d-flex justify-content-between align-items-start`}>
                <p>{momentTime.format("D MMM")}</p>
                <p>ساعت {momentTime.format("HH:mm")}</p>
            </div>
        </motion.div>
    )
}

export default SquareNewsCard