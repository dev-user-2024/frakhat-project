import styles from "./CoursesSectionHeader.module.css"
import Banner from '../../../assets/images/CourseDetail-banner.png'
import Banner2 from '../../../assets/images/tagsCard-img5.png'
import Banner3 from '../../../assets/images/tagsCard-img1.png'
import Banner4 from '../../../assets/images/tagsCard-img2.png'
import Banner5 from '../../../assets/images/tagsCard-img3.png'
import CoursesSectionHeaderBanner from './coursesSection_header_banner/CoursesSectionHeaderBanner';


const CoursesSectionHeader = (courses) => {

    // const [courseBanner, setCourseBanner] = useState(["در حال دریافت اطلاعات..."])
    const slides = [
        { src: Banner, alt: "beach" },
        { src: Banner2, alt: "boat" },
        { src: Banner3, alt: "forest" },
        { src: Banner4, alt: "city" },
        { src: Banner5, alt: "italy" },
    ];

    return (
        <div className={`${styles.coursesSection_header_container}`}>
            <div className={`${styles.coursesSection_header} mt-5`}>
                <CoursesSectionHeaderBanner slides={slides} courses={courses.courses} />
            </div>
        </div>
    )
}

export default CoursesSectionHeader