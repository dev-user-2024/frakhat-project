import styles from './CoursesSectionPromotionalPhoto.module.css'
import banner from '../../../assets/images/courses-mobile-repairs.jpg'
import { useNavigate } from 'react-router-dom'

const CoursesSectionPromotionalPhoto = () => {
    const navigate = useNavigate()

    const navigateToCourse = () => {
        navigate('courses/courseDetails/20')
    }

    return (
        <div className={styles.promotionalPhotoContainer}>
            <img src={banner} alt="" onClick={navigateToCourse}/>
        </div>
    )
}

export default CoursesSectionPromotionalPhoto