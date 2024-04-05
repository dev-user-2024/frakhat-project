import { Box, Grid } from '@mui/material'
import * as Styled from './styled'
import image from '../../../assets/images/teacher-page.png'
import instagramIcon from '../../../assets/icons/teachers-instagram-logo.svg'
import twitterIcon from '../../../assets/icons/teachers-twitter-logo.svg'
import linkedinIcon from '../../../assets/icons/teachers-linkedin-logo.svg'

const Teachers = () => {
    return (
        <Styled.CoursesCategoryContainer>
            <Box>
                <h2>
                    اساتید <span>فراخط</span>
                </h2>
            </Box>
            <Box>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون</p>
            </Box>
            <Grid container>
                <Grid>
                    <img src={image} alt="" />
                    <div>
                        <h4>سعید پیردوست</h4>
                        <p>12 سال سابقه در حوزه گرافیک و فعالیت در برترین شرکت‌های ایران</p>
                        <p>مدرس دوره‌های: فتوشاپ-ایلاستریتور-موهو</p>
                        <div>
                            <div>
                                <img src={linkedinIcon} alt="" />
                            </div>
                            <div>
                                <img src={twitterIcon} alt="" />
                            </div>
                            <div>
                                <img src={instagramIcon} alt="" />
                            </div>
                        </div>
                    </div>
                </Grid>
            </Grid>

        </Styled.CoursesCategoryContainer>
    )
}

export default Teachers