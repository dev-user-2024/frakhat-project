import { Box, Button, Grid } from '@mui/material'
import * as Styled from './styled'
import categoryIcon1 from '../../../assets/icons/LandingCourses-category1.svg'
import categoryIcon2 from '../../../assets/icons/LandingCourses-category2.svg'
import categoryIcon3 from '../../../assets/icons/LandingCourses-category3.svg'
import categoryIcon4 from '../../../assets/icons/LandingCourses-category4.svg'
import categoryIcon5 from '../../../assets/icons/LandingCourses-category5.svg'
import categoryIcon6 from '../../../assets/icons/LandingCourses-category6.svg'
import categoryIcon7 from '../../../assets/icons/LandingCourses-category7.svg'
import categoryIcon8 from '../../../assets/icons/LandingCourses-category8.svg'
import categoryIcon9 from '../../../assets/icons/LandingCourses-category9.svg'
import categoryIcon10 from '../../../assets/icons/LandingCourses-category10.svg'

import background1 from '../../../assets/icons/LandingCourses-category-background1.svg'
import background2 from '../../../assets/icons/LandingCourses-category-background2.svg'
import background3 from '../../../assets/icons/LandingCourses-category-background3.svg'
import background4 from '../../../assets/icons/LandingCourses-category-background4.svg'
import background5 from '../../../assets/icons/LandingCourses-category-background5.svg'
import background6 from '../../../assets/icons/LandingCourses-category-background6.svg'
import background7 from '../../../assets/icons/LandingCourses-category-background7.svg'
import background8 from '../../../assets/icons/LandingCourses-category-background8.svg'
import background9 from '../../../assets/icons/LandingCourses-category-background9.svg'
import background10 from '../../../assets/icons/LandingCourses-category-background10.svg'
import { Link } from 'react-router-dom'


const CoursesCategory = () => {
    return (
        <Styled.CoursesCategoryContainer>
            <Box>
                <span>دسته‌بندی دوره‌ها</span>
            </Box>
            <Box>
                <h2>
                    محورهای آموزشی <span>فراخط</span>
                </h2>
            </Box>
            <Grid container>
                <Grid>
                    <img src={background1} alt="" />
                    <img src={categoryIcon1} alt="" />
                    <h4>برنامه نویسی و هوش مصنوعی</h4>
                    <span>5 دوره</span>
                </Grid>
                <Grid>
                    <img src={background2} alt="" />
                    <img src={categoryIcon2} alt="" />
                    <h4>طراحی و دیزاین</h4>
                    <span>3 دوره</span>
                </Grid>
                <Grid>
                    <img src={background3} alt="" />
                    <img src={categoryIcon3} alt="" />
                    <h4>مهارت‌های نرم</h4>
                    <span>4 دوره</span>
                </Grid>
                <Grid>
                    <img src={background4} alt="" />
                    <img src={categoryIcon4} alt="" />
                    <h4>کارآفرینی</h4>
                    <span>3 دوره</span>
                </Grid>
                <Grid>
                    <img src={background5} alt="" />
                    <img src={categoryIcon5} alt="" />
                    <h4>زبان‌های خارجه</h4>
                    <span>3 دوره</span>
                </Grid>
                <Grid>
                    <img src={background6} alt="" />
                    <img src={categoryIcon6} alt="" />
                    <h4>مهارتی</h4>
                    <span>7 دوره</span>
                </Grid>
                <Grid>
                    <img src={background7} alt="" />
                    <img src={categoryIcon7} alt="" />
                    <h4>عکاسی</h4>
                    <span>2 دوره</span>
                </Grid>
                <Grid>
                    <img src={background8} alt="" />
                    <img src={categoryIcon8} alt="" />
                    <h4>تعمیرات</h4>
                    <span>3 دوره</span>
                </Grid>
                <Grid>
                    <img src={background9} alt="" />
                    <img src={categoryIcon9} alt="" />
                    <h4>مینی‌دوره‌ها</h4>
                    <span>5 دوره</span>
                </Grid>
                <Grid>
                    <img src={background10} alt="" />
                    <img src={categoryIcon10} alt="" />
                    <h4>مینی‌دوره‌ها</h4>
                    <span>6 دوره</span>
                </Grid>
            </Grid>
            <Box>
                <Link to={'/courses'}>
                    <Button variant='contained'>مشاهده دوره‌ها</Button>
                </Link>
            </Box>
        </Styled.CoursesCategoryContainer>
    )
}

export default CoursesCategory