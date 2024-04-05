import { forwardRef, useContext } from 'react'
import { Box, Button, Grid } from '@mui/material'
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
import { Link } from 'react-router-dom'

const PopularCourses = ({ courses, coursesRef }) => {
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
        <Styled.PopularCoursesContainer ref={coursesRef}>
            <Box>
                <span>لیست دوره‌های محبوب فراخط</span>
            </Box>
            <Box>
                <h2>
                    تجربه‌ای متفاوت با <span>دوره‌های فراخط‌</span>
                </h2>
            </Box>
            <Grid container>
                {
                    courses.slice(0, 6)?.map(item => (
                        <Grid key={item.id}>
                            <Link to={`/courses/courseDetails/${item.id}`}>
                                <h4>{item.title_course}</h4>
                            </Link>
                            <div>
                                <div>
                                    {/* <img src={''} alt="course image" />. */}
                                </div>
                            </div>
                            <Button onClick={() => sendCourse(item)}>
                                <img src={bagIcon} alt="" />
                            </Button>
                        </Grid>
                    ))
                }
            </Grid>
            <Box>
                <Link to={'/courses'}>
                    <Button variant='contained'>مشاهده همه دوره‌ها</Button>
                </Link>
            </Box>
        </Styled.PopularCoursesContainer>
    )
}

export default PopularCourses