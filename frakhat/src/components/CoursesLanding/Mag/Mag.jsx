import { Box, Button, Grid } from '@mui/material'
import * as Styled from './styled'
import magImage1 from '../../../assets/images/CoursesLanding-Mag1.png'
import magImage2 from '../../../assets/images/CoursesLanding-Mag2.png'
import magImage3 from '../../../assets/images/CoursesLanding-Mag3.png'
import magImage4 from '../../../assets/images/CoursesLanding-Mag4.png'
import { Link } from 'react-router-dom'

const Mag = () => {
    return (
        <Styled.MagContainer>
            <Box>
                <span>مجله خبری</span>
            </Box>
            <Box>
                <h2>
                    تازه‌های <span>علم و فناوری</span>
                </h2>
            </Box>
            <Grid container>
                <Grid>
                    <img src={magImage1} alt="" />
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </p>
                </Grid>
                <Grid>
                    <img src={magImage2} alt="" />
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </p>
                </Grid>
                <Grid>
                    <img src={magImage3} alt="" />
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </p>
                </Grid>
                <Grid>
                    <img src={magImage4} alt="" />
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </p>
                </Grid>
            </Grid>
            <Box>
                <Link to={'/mag'}>
                    <Button variant='contained'>مشاهده همه اخبار</Button>
                </Link>
            </Box>
        </Styled.MagContainer>
    )
}

export default Mag