import styles from './promotionalPhoto.module.css'
import banner from '../../../assets/images/home-promotional-photo.jpg'
import { useNavigate } from 'react-router-dom'

const PromotionalPhoto = () => {
    const navigate = useNavigate()

    const navigateToCourse = () => {
        navigate('/courses')
    }

    return (
        <div className={styles.promotionalPhotoContainer}>
            <img onClick={navigateToCourse} src={banner} alt="" />
        </div>
    )
}

export default PromotionalPhoto