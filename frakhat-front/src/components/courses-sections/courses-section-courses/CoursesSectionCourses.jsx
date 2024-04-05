import { Button, Grid } from '@mui/material'
import * as Styled from './styled'
import image1 from '../../../assets/images/CoursesLanding-popular1.png'
import image2 from '../../../assets/images/CoursesLanding-popular2.png'
import image3 from '../../../assets/images/CoursesLanding-popular3.png'
import image4 from '../../../assets/images/CoursesLanding-popular4.png'
import image5 from '../../../assets/images/CoursesLanding-popular5.png'
import image6 from '../../../assets/images/CoursesLanding-popular6.png'
import bagIcon from '../../../assets/icons/CoursesCategory-shopping-bag.svg'
import { CartContext } from "../../../providers/CartProvider";
import { useAuth } from '../../../hooks/useAuth'
import { useContext } from 'react'
import { Link } from 'react-router-dom'

const CoursesSectionCourses = ({ courses }) => {
    const { hasAuth, user } = useAuth();
    const { addToCart, cartItems } = useContext(CartContext)

    const sendCourse = (item) => {
        if (hasAuth) {
            addToCart({ course_id: item.id, user_id: user.id }, item);
        } else {
            addToCart({ course_id: item.id, user_id: '' }, item)
        }
    }

    return (
        <Styled.CoursesSectionCoursesContainer>
            <Grid container>
                <Grid>
                    <h4>7 دوره یافت شد</h4>
                </Grid>
                <Grid>
                    <span style={{ marginLeft: 7 }}>مرتب‌سازی بر اساس:</span>
                    <Button>جدیدترین</Button>
                    <Button>محبوب‌ترین</Button>
                </Grid>
            </Grid>
            <Grid container>
                {
                    courses?.map(item => (
                        <Grid key={item.id}>
                            <Link to={`/courses/courseDetails/${item.id}`}>
                                <h4>{item.title_course}</h4>
                            </Link>
                            <div>
                                <div>
                                    <Link to={`/courses/courseDetails/${item.id}`}>
                                        {/* <img src={''} alt="course image" /> */}
                                    </Link>
                                </div>
                            </div>
                            <Button onClick={() => sendCourse(item)}>
                                <img src={bagIcon} alt="" />
                            </Button>
                        </Grid>
                    ))
                }

            </Grid>
        </Styled.CoursesSectionCoursesContainer>
    )
}

export default CoursesSectionCourses