import { Box, Typography } from "@mui/material";
import React from "react";
import { useTheme } from "@mui/material";
import { EffectCoverflow, Navigation } from "swiper";
import "swiper/css";
import "swiper/css/effect-coverflow";
import "swiper/css/pagination";
import "swiper/css/navigation";
import { Swiper, SwiperSlide } from "swiper/react";
import imageSlider1 from "../../../assets/images/about-slider-1.png";
import imageSlider2 from "../../../assets/images/about-slider-2.png";
import imageSlider3 from "../../../assets/images/about-slider-3.png";
import imageSlider4 from "../../../assets/images/about-slider-4.png";
import imageSlider5 from "../../../assets/images/about-slider-5.png";
import icon1 from "../../../assets/icons/arrow-line-left.svg";
import icon2 from "../../../assets/icons/arrow-line-right.svg";
import "./style.css";
import { useState } from "react";
const CourseDetailsSampleTraining = () => {
  const theme = useTheme();
  const [imageSlider] = useState([
    imageSlider1,
    imageSlider2,
    imageSlider3,
    imageSlider4,
    imageSlider5,
  ]);

  return (
    <Box maxWidth={1140} margin="150px auto 0 auto" padding={{ xs: "0 25px" }}>
      <Box sx={{ width: "fit-content", margin: "0 auto" }}>
        <Typography
          sx={{
            backgroundColor: "#E5F7FD",
            borderRadius: "58px",
            padding: "10px 24px",
            color: "#00ACEE",
          }}
        >
          نمونه آموزش
        </Typography>
      </Box>
      <Box my={3} sx={{textAlign: 'center'}} >
        <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:36,md:40}}
          color={theme.palette.primary.main}
          display="inline"
        >
          باسبک آموزش فراخط
          &nbsp;
          <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:36,md:40}}
          color={theme.palette.secondary.main}
          display="inline"
        >
          بیشتر آشنا شوید
        </Typography>
        </Typography>
      </Box>
      <Box my={3}>
        <Swiper
          effect={"coverflow"}
          grabCursor={true}
          centeredSlides={true}
          loop={true}
          slidesPerView={3}
          coverflowEffect={{
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 2.5
          }}
          navigation={{
            nextEl: ".swiper-button-next2",
            prevEl: ".swiper-button-prev2",
            clickable: true,
          }}
          modules={[EffectCoverflow, Navigation]}
          className="swiper_container"
        >
          {imageSlider?.map((item, i) => (
            <SwiperSlide
              className="course-slider"
              key={i}
              style={{ width: 400, height: 328 }}
            >
              <img src={item} alt="slide_image" />
            </SwiperSlide>
          ))}
          <Box textAlign='center'>
            <button className="swiper-button-prev2">
              <img alt="" src={icon2} />
            </button>
            <button className="swiper-button-next2">
              <img alt="" src={icon1} />
            </button>
          </Box>
        </Swiper>
      </Box>
    </Box>
  );
};

export default CourseDetailsSampleTraining;
