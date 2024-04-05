import { Link } from "react-router-dom"
import { ReactComponent as TitleIcon } from "../../assets/icons/newsTitle_icon.svg"
import styles from "./title-line.module.css"

const TitleLine = ({ title, linkto, activeClass,onChangeHandler }) => {
    return (
        <div className={`${styles.title_line_container} w-100 `} onClick={onChangeHandler}>
            <Link className={`${styles.title_line_link} d-flex align-items-center`} to>
                <div className={`${styles.title_line_icon} d-flex align-items-center`}>
                    <TitleIcon />
                    <p className={styles.activeClass}>{title}</p>
                </div>
                <div className={`${styles.title_line} ${styles[activeClass]}`}></div>
            </Link>
        </div>
    )
}

export default TitleLine;