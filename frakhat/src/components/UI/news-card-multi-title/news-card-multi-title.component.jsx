import { Link } from "react-router-dom"

import TitleLine from "../../title-line/title-line.component"
import { motion } from "framer-motion"

import styles from "./news-card-multi-title.module.css"

const NewsCardMultiTitle = ({ headerTitle, data, id }) => {
    return (
        <div id={id} className={`${styles.news_card_multi_title_container} w-100 d-flex flex-column justify-content-between align-items-start`}>
            <TitleLine title={headerTitle} />
            <motion.div whileHover={{ scale: 1.02 }} className={`${styles.news_card_multi_title} w-100 d-flex flex-column align-items-start`}>
                <img src={`https://support.frakhat.ir/${data[data.length - 1].image}`} alt="" className={styles.card_image} />
                <div className={`${styles.news_card_multi_title_text} d-flex flex-column align-items-start`} >
                    {
                        data.slice(-3).reverse().map((item, index) => (
                            <Link key={index} to={`/mag/magDetails/${item.id}`} id={item.id}>
                                <motion.p whileTap={{ scale: 1.02 }}>{item.title.length > 48 ? item.title.slice(0, 48) + "..." : item.title}</motion.p>
                            </Link>
                        ))

                    }
                </div>
            </motion.div>
        </div>
    )
}

export default NewsCardMultiTitle