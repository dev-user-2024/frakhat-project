import { Box, Grid } from '@mui/material'
import * as Styled from './styled'
import image1 from '../../../assets/images/CoursesLanding-OurGoal1.png'
import image2 from '../../../assets/images/CoursesLanding-OurGoal2.png'
import image3 from '../../../assets/images/CoursesLanding-OurGoal3.png'

const OurGoal = () => {
    return (
        <Styled.OurGoalContainer>
            <Box>
                <h2>
                    هدف و  <span>چشم انداز ما</span>
                </h2>
            </Box>
            <Box>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
            </Box>
            <Grid container>
                <Grid>
                    <img src={image1} alt="" />
                    <h5>چشم‌انداز</h5>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه.
                    </p>
                </Grid>
                <Grid>
                    <img src={image2} alt="" />
                    <h5>ارزش‌ها</h5>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه.
                    </p>
                </Grid>
                <Grid>
                    <img src={image3} alt="" />
                    <h5>هدف</h5>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه.
                    </p>
                </Grid>
            </Grid>
        </Styled.OurGoalContainer>
    )
}

export default OurGoal