import { Box, Grid, Paper } from '@mui/material'
import * as Styled from './styled'
import image1 from '../../../assets/images/LandingCourses-about1.png'
import image2 from '../../../assets/images/LandingCourses-about2.png'
import image3 from '../../../assets/images/LandingCourses-about3.png'
import image4 from '../../../assets/images/LandingCourses-about4.png'
import image5 from '../../../assets/images/LandingCourses-about5.png'

import verifyIcon from '../../../assets/icons/LandingCourses-verify.svg'
import emptyWalletIcon from '../../../assets/icons/LandingCourses-empty-wallet-change.svg'
import moneysendIcon from '../../../assets/icons/LandingCourses-moneysend.svg'
import useroctagonIcon from '../../../assets/icons/LandingCourses-useroctagon.svg'


const AboutCourses = () => {
    return (
        <Styled.AboutCoursesContainer>
            <div>
                <Box>
                    <Paper>
                        <img src={image1} alt="" />
                        <h5>+ 500 مهارت جو</h5>
                    </Paper>
                </Box>
                <Box>
                    <Paper>
                        <img src={image2} alt="" />
                        <h5>+ 300 ساعت آموزش</h5>
                    </Paper>
                </Box>
                <Box>
                    <Paper>
                        <img src={image3} alt="" />
                        <h5>+ 30 متخصص و منتور</h5>
                    </Paper>
                </Box>
                <Box>
                    <Paper>
                        <img src={image4} alt="" />
                        <h5>+ 40 دوره آموزشی</h5>
                    </Paper>
                </Box>
            </div>
            <Grid container>
                <Grid md={6} xs={12}>
                    <h2>دوره‌های <span>فراخط</span></h2>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                </Grid>
                <Grid md={6} xs={12}>
                    <img src={image5} alt="" />
                </Grid>
            </Grid>
            <Grid container>
                <Grid>
                    <div>
                        <img src={verifyIcon} alt="" />
                        <h3>ارائه مدرک معتبر</h3>
                    </div>
                    <div>
                        <p>متنی برای توضیح این قسمت است.</p>
                    </div>
                </Grid>
                <Grid>
                    <div>
                        <div>
                            <img src={emptyWalletIcon} alt="" />
                        </div>
                        <h3>گواهی ضمانت بازگشت وجه</h3>
                    </div>
                    <div>
                        <p>متنی برای توضیح این قسمت است.</p>
                    </div>
                </Grid>
                <Grid>
                    <div>
                        <img src={useroctagonIcon} alt="" />
                        <h3>اساتید متخصص و باتجربه</h3>
                    </div>
                    <div>
                        <p>متنی برای توضیح این قسمت است.</p>
                    </div>
                </Grid>
                <Grid>
                    <div>
                        <img src={moneysendIcon} alt="" />
                        <h3>معرفی به بازارکار</h3>
                    </div>
                    <div>
                        <p>متنی برای توضیح این قسمت است</p>
                    </div>
                </Grid>
            </Grid>
        </Styled.AboutCoursesContainer>
    )
}

export default AboutCourses