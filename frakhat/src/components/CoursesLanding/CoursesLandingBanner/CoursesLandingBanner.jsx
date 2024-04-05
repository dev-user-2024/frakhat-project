import { Button, Grid } from '@mui/material'
import * as Styled from './styled'
import banner from '../../../assets/images/banner-image.png'
import cloud1 from '../../../assets/images/Cloud1.png'
import cloud2 from '../../../assets/images/Cloud2.png'
import { useNavigate } from 'react-router-dom'

const CoursesLandingBanner = ({coursesRef}) => {

    const handleScroll = () => {
        coursesRef.current.scrollIntoView({ behavior: 'smooth' });
    }

    const navigate = useNavigate()

    return (
        <Styled.CoursesLandingBanner container>
            <Grid md={5} xs={12}>
                <div className='banner-title'>
                    <h1>
                        آینده <span>روشنی</span> را <br />
                        به شما نوید می‌دهیم
                    </h1>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه
                    </p>
                    <span>به جمع بیش از 500  مهارت جو و هنرجو بپیوندید!</span>
                    <div>
                        <Button variant="contained" onClick={() => navigate('/consultation-form')}>مشاوره رایگان</Button>
                        <Button variant="outlined" onClick={handleScroll}>مشاهده دوره‌ها</Button>
                    </div>
                </div>
            </Grid>
            <Grid md={7} xs={12}>
                <img src={banner} alt="banner image" />
                <img src={cloud1} alt="cloud image" />
                <img src={cloud2} alt="cloud image" />
            </Grid>
        </Styled.CoursesLandingBanner>
    )
}

export default CoursesLandingBanner