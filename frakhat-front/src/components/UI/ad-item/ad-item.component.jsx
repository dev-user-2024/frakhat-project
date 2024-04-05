import styles from "./ad-item.module.css"


const AdItem = ({ image, alt, styleType, url }) => {
    return (
        <a href={url} className={styles.ad_item_link}>
            <div className={`${styles.ad_item} ${styles[styleType]}`}>
                <img src={`https://support.frakhat.ir/${image}`} alt={alt} />
            </div>
        </a>
    )
}

export default AdItem