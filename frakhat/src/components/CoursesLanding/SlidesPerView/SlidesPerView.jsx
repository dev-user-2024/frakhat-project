import { Box } from '@mui/material'
import * as Styled from './styled'
import image1 from '../../../assets/images/CoursesLanding-popular1.png'
import image2 from '../../../assets/images/CoursesLanding-popular2.png'
import image3 from '../../../assets/images/CoursesLanding-popular3.png'
import image4 from '../../../assets/images/CoursesLanding-popular4.png'
import image5 from '../../../assets/images/CoursesLanding-popular5.png'
import image6 from '../../../assets/images/CoursesLanding-popular6.png'

import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

// import required modules
import { Autoplay, Pagination, Navigation } from "swiper";

const SlidesPerView = () => {
  return (
    <Styled.SlidesPerViewContainer>
      <Box>
        <h2>
          دوره‌های <span>فراخط</span>
        </h2>
      </Box>
      <Swiper
        slidesPerView={4.4}
        spaceBetween={30}
        centeredSlides={false}
        autoplay={{
          delay: 2500,
          disableOnInteraction: false,
        }}
        pagination={{
          clickable: true,
        }}
        navigation={false}
        modules={[Autoplay,]}
        className={`my_Swiper`}
      >
        <SwiperSlide className={'swiper_slide'}>
          <div>
            <img src={image1} alt="" />
          </div>
          <p>فتوشاپ</p>
        </SwiperSlide>
        <SwiperSlide className={'swiper_slide'}>
          <div>
            <img src={image2} alt="" />
          </div>
          <p>حسابداری</p>
        </SwiperSlide>
        <SwiperSlide className={'swiper_slide'}>
          <div>
            <img src={image3} alt="" />
          </div>
          <p>تعمیرات موبایل</p>
        </SwiperSlide>
        <SwiperSlide className={'swiper_slide'}>
          <div>
            <img src={image4} alt="" />
          </div>
          <p>پرورش زنبور عسل</p>
        </SwiperSlide>
        <SwiperSlide className={'swiper_slide'}>
          <div>
            <img src={image5} alt="" />
          </div>
          <p>هوش مصنوعی</p>
        </SwiperSlide>
        <SwiperSlide className={'swiper_slide'}>
          <div>
            <img src={image6} alt="" />
          </div>
          <p>طراحی لوگو</p>
        </SwiperSlide>
      </Swiper>
    </Styled.SlidesPerViewContainer>
  )
}

export default SlidesPerView