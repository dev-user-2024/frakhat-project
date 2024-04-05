import { Box, Button, Grid } from '@mui/material'
import * as Styled from './styled'
import image from '../../../assets/images/CoursesLanding-JobSearch.png'
import { Link } from 'react-router-dom'

const JobSearch = () => {
    return (
        <Styled.JobSearchContainer container>
            <Grid md={6} xs={12}>
                <img src={image} alt="" />
            </Grid>
            <Grid md={6} xs={12}>
                <Box>
                    <span>کاریابی فراخط</span>
                </Box>
                <Box>
                    <h2>
                        آینده شغلی شما را  <span>تضمین می‌کنیم</span>
                    </h2>
                </Box>
                <Box>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ.</p>
                </Box>
                <Box>
                    <Link to={'/jobs-landing'}>
                        <Button variant='contained'>مشاهده فرصت‌های شغلی</Button>
                    </Link>
                </Box>
            </Grid>
        </Styled.JobSearchContainer>
    )
}

export default JobSearch