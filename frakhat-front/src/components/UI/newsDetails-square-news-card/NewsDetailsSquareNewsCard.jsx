import { Link } from 'react-router-dom'
import styles from "./newsDetailsSquareNewsCard.module.css"

const NewsDetailsSquareNewsCard = ({ imageSrc, title }) => {
    return (
        <Link to={`/mag/magDetails/${title}`}>
            <div className={`${styles.NewsDetailsSquareNewsCard} d-flex`}>
                <img src={imageSrc} alt={title} />
                <p>{title && title.length > 40 ? title.slice(0, 50) + '...' : title}</p>
            </div>
        </Link>
    )
}

export default NewsDetailsSquareNewsCard