import { Link } from "react-router-dom"

import styles from "./horizontal-news-card.module.css"
import { useState } from "react"


const HorizontalNewsCard = ({ image, id, title, summary, typeUse, content }) => {

    return (
        <div className={`${styles.Card_container} ${styles[typeUse]} d-flex justify-content-start align-items-start `}>
            <div>
                <img src={image} alt="" className={`${styles.card_image} `} />
            </div>
            <Link to={`/mag/magDetails/${id}`}>
                <div className={`${styles.card_context} d-flex flex-column justify-content-start align-items-start`}>
                    <h3>{title.length > 40 ? title.slice(0, 40) + "..." : title}</h3>
                    <p>{content.length > 370 ? content.slice(0, 370) + "..." : content}</p>
                    <p>{summary.length > 90 ? summary.slice(0, 90) + "..." : summary} </p>
                </div>
            </Link>
        </div>
    )
}

export default HorizontalNewsCard