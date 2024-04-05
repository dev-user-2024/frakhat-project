import { Box, Button, Grid } from '@mui/material'
import * as Styled from './styled'
import image1 from '../../../assets/images/CoursesLanding-CoursesProfessors1.png'
import image2 from '../../../assets/images/CoursesLanding-CoursesProfessors2.png'
import image3 from '../../../assets/images/CoursesLanding-CoursesProfessors3.png'
import image4 from '../../../assets/images/CoursesLanding-CoursesProfessors4.png'
import { Link } from 'react-router-dom'

const CoursesProfessors = () => {
    return (
        <Styled.CoursesProfessorsContainer>
            <Box>
                <span>لیست اساتید فراخط</span>
            </Box>
            <Box>
                <h2>
                    برترین‌ها <span>همراه ما هستند</span>
                </h2>
            </Box>
            <Grid container>
                <Grid>
                    <img src={image1} alt="" />
                    <h5>مریم محمدی</h5>
                    <span>مدرس زبان انگلیسی</span>
                </Grid>
                <Grid>
                    <img src={image2} alt="" />
                    <h5>جمشید هاشم‌پور</h5>
                    <span>مدرس فتوشاپ</span>
                </Grid>
                <Grid>
                    <img src={image3} alt="" />
                    <h5>سارا امیری</h5>
                    <span>مدرس هوش مصنوعی</span>
                </Grid>
                <Grid>
                    <img src={image4} alt="" />
                    <h5>ابوالفضل پورعرب</h5>
                    <span>مدرس حسابداری</span>
                </Grid>
            </Grid>
            <Box>
                <Link to={'/teachers'}>
                    <Button variant='contained'>مشاهده همه اساتید</Button>
                </Link>
            </Box>
        </Styled.CoursesProfessorsContainer>
    )
}

export default CoursesProfessors