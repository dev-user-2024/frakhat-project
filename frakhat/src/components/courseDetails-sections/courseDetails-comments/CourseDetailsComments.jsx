import React from "react";
import { Avatar, Box, Grid, Rating, Typography } from "@mui/material";
import { useTheme } from "@mui/material";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import "swiper/css/navigation";
import { Navigation } from "swiper";
import img1 from "../../../assets/images/Rectangle 260.png";
import img2 from "../../../assets/images/CoursesLanding-CoursesProfessors1.png";
import StarOutlineRoundedIcon from "@mui/icons-material/StarOutlineRounded";
import StarRateRoundedIcon from "@mui/icons-material/StarRateRounded";
import icon1 from "../../../assets/icons/arrow-line-left.svg";
import icon2 from "../../../assets/icons/arrow-line-right.svg";

const CourseDetailsComments = () => {
  const theme = useTheme();
  const swiperParams = {
    navigation: {
      nextEl: ".custom-next-button", // انتخاب المان برای دکمه بعدی
      prevEl: ".custom-prev-button", // انتخاب المان برای دکمه قبلی
    },
  };
  return (
    <Box
      p={4}
      sx={{
        background: "#EEF2F8",
        marginTop: "100px",
      }}
    >
      <Box sx={{ maxWidth: "1140px", margin: "0 auto", textAlign: "center" }} padding={{ xs: "0 25px" }}>
        <Box sx={{ width: "fit-content", margin: "0 auto" }}>
          <Typography
            sx={{
              backgroundColor: "#fff",
              borderRadius: "58px",
              padding: "10px 24px",
              color: "#00ACEE",
            }}
          >
            نظرات شرکت کننده ها
          </Typography>
        </Box>
        <Box my={3} display="flex" justifyContent="center">
          <Typography
            variant="h2"
            fontWeight={700}
            fontSize={{xs:36,md:40}}
            display='inline'
            color={theme.palette.primary.main}
          >
            نظرات شرکت کننده های
            &nbsp;
            <Typography
            variant="h2"
            fontWeight={700}
            fontSize={{xs:36,md:40}}
            display='inline'
            color={theme.palette.secondary.main}
          >
            دوره فتوشاپ
          </Typography>
          </Typography>
          
        </Box>
        <Box>
          <Swiper
            navigation={true}
            modules={[Navigation]}
            className="mySwiper1"
            {...swiperParams}
            slidesPerView={1}
            breakpoints={{
              640: {
                slidesPerView: 1,
                spaceBetween: 20,
              },
              768: {
                slidesPerView: 2,
                spaceBetween: 40,
              },
            }}
          >
            <SwiperSlide className="slider1">
              <Box px={8} textAlign="center">
                <Box
                  sx={{
                    backgroundColor: "#fff",
                    borderRadius: "12px",
                    boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)",
                  }}
                  p={2}
                >
                  <Avatar
                    alt="Remy Sharp"
                    src={img2}
                    sx={{ width: 68, height: 68, margin: "0 auto" }}
                  />
                  <Typography fontWeight={600} sx={{ mt: 2 }}>
                    صالح قربانی
                  </Typography>
                  <Typography variant="caption" color="#375288" sx={{ mt: 1 }}>
                    دانشجوی دوره فتوشاپ
                  </Typography>
                  <Box mt={1}>
                    <Rating
                      icon={
                        <StarRateRoundedIcon
                          sx={{ color: "#00acee" }}
                          fontSize="inherit"
                        />
                      }
                      emptyIcon={
                        <StarOutlineRoundedIcon
                          sx={{ color: "#00acee" }}
                          fontSize="inherit"
                        />
                      }
                      name="read-only"
                      value={3}
                      readOnly
                    />
                  </Box>
                  <Box mt={2} px={3}>
                    <Typography
                      textAlign="right"
                      color="#111929"
                      fontSize="14px"
                    >
                      دوره بسیار عالی بود. متنورینگ خوب و تصحیح تمارین، باعث شد
                      به صورت بهتری روی مهارت های فنی خودم متمرکز بشم و کارهارو
                      سریع تر یادبگیرم.
                    </Typography>
                  </Box>
                </Box>
              </Box>
            </SwiperSlide>
            <SwiperSlide className="slider1">
              <Box px={8} textAlign="center">
                <Box
                  sx={{
                    backgroundColor: "#fff",
                    borderRadius: "12px",
                    boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)",
                  }}
                  p={2}
                >
                  <Avatar
                    alt="Remy Sharp"
                    src={img2}
                    sx={{ width: 68, height: 68, margin: "0 auto" }}
                  />
                  <Typography fontWeight={600} sx={{ mt: 2 }}>
                    صالح قربانی
                  </Typography>
                  <Typography variant="caption" color="#375288" sx={{ mt: 1 }}>
                    دانشجوی دوره فتوشاپ
                  </Typography>
                  <Box mt={1}>
                    <Rating
                      icon={
                        <StarRateRoundedIcon
                          sx={{ color: "#00acee" }}
                          fontSize="inherit"
                        />
                      }
                      emptyIcon={
                        <StarOutlineRoundedIcon
                          sx={{ color: "#00acee" }}
                          fontSize="inherit"
                        />
                      }
                      name="read-only"
                      value={3}
                      readOnly
                    />
                  </Box>
                  <Box mt={2} px={3}>
                    <Typography
                      textAlign="right"
                      color="#111929"
                      fontSize="14px"
                    >
                      دوره بسیار عالی بود. متنورینگ خوب و تصحیح تمارین، باعث شد
                      به صورت بهتری روی مهارت های فنی خودم متمرکز بشم و کارهارو
                      سریع تر یادبگیرم.
                    </Typography>
                  </Box>
                </Box>
              </Box>
            </SwiperSlide>
            <SwiperSlide className="slider1">
              <Box px={8} textAlign="center">
                <Box
                  sx={{
                    backgroundColor: "#fff",
                    borderRadius: "12px",
                    boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)",
                  }}
                  p={2}
                >
                  <Avatar
                    alt="Remy Sharp"
                    src={img2}
                    sx={{ width: 68, height: 68, margin: "0 auto" }}
                  />
                  <Typography fontWeight={600} sx={{ mt: 2 }}>
                    صالح قربانی
                  </Typography>
                  <Typography variant="caption" color="#375288" sx={{ mt: 1 }}>
                    دانشجوی دوره فتوشاپ
                  </Typography>
                  <Box mt={1}>
                    <Rating
                      icon={
                        <StarRateRoundedIcon
                          sx={{ color: "#00acee" }}
                          fontSize="inherit"
                        />
                      }
                      emptyIcon={
                        <StarOutlineRoundedIcon
                          sx={{ color: "#00acee" }}
                          fontSize="inherit"
                        />
                      }
                      name="read-only"
                      value={3}
                      readOnly
                    />
                  </Box>
                  <Box mt={2} px={3}>
                    <Typography
                      textAlign="right"
                      color="#111929"
                      fontSize="14px"
                    >
                      دوره بسیار عالی بود. متنورینگ خوب و تصحیح تمارین، باعث شد
                      به صورت بهتری روی مهارت های فنی خودم متمرکز بشم و کارهارو
                      سریع تر یادبگیرم.
                    </Typography>
                  </Box>
                </Box>
              </Box>
            </SwiperSlide>

            <button className="custom-prev-button">
              <img alt="" src={icon1} />
            </button>
            <button className="custom-next-button">
              <img alt="" src={icon2} />
            </button>
          </Swiper>
        </Box>
      </Box>
    </Box>
  );
};

export default CourseDetailsComments;
