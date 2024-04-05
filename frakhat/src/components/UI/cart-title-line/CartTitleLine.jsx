import { Link } from 'react-router-dom'
import styles from './cartTitleLine.module.css'

const CartTitleLine = ({title, icon}) => {
    return (
        <div className={`${styles.title_line_container} w-100 `} >
            <Link className={`${styles.title_line_link} d-flex align-items-center`} to>
                <div className={`${styles.title_line_icon} d-flex align-items-center`}>
                    <img src={icon} alt="" />
                    <p className={styles.activeClass}>{title}</p>
                </div>
                <div className={styles.title_line}></div>
            </Link>
        </div>
    )
}

export default CartTitleLine