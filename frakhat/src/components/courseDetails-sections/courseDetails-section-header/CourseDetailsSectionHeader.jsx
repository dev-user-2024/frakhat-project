import { useContext, useEffect, useState } from "react";
import { Box, Grid, Typography, Button, styled } from "@mui/material";
import { useTheme } from "@mui/material";
import { useAuth } from "../../../hooks/useAuth";
import { CartContext } from "../../../providers/CartProvider";
import { useNavigate } from "react-router-dom";
import parse from "html-react-parser";
import DOMPurify from "dompurify";

import img1 from "../../../assets/images/Frame 20700.png";
import icon1 from "../../../assets/icons/Group 634.png";
import icon2 from "../../../assets/icons/Group 636.png";
import icon3 from "../../../assets/icons/Group 637.png";
import icon4 from "../../../assets/icons/Group 638.png";

const CourseDetailsSectionHeader = ({ course }) => {
  const theme = useTheme();
  const { hasAuth, user } = useAuth();
  const { addToCart, cartItems } = useContext(CartContext)
  const [isItemInCart, setIsItemInCart] = useState(false);
  const navigate = useNavigate()

  const courseAbout = DOMPurify.sanitize(course.excerpt_course, {
    USE_PROFILES: { html: true },
  });

  useEffect(() => {
    setIsItemInCart(cartItems?.cart_items?.course?.some(cartItem => cartItem.id === course.id));
  }, [cartItems, course.id]);

  const sendCourse = () => {
    if (hasAuth) {
      addToCart({ course_id: course.id, user_id: user.id }, course);
    } else {
      addToCart({ course_id: course.id, user_id: '' }, course)
    }
  }

  const CardBox = styled(Box)(({ theme }) => ({
    backgroundColor: "#fff",
    border: "1px solid #B7C2D6",
    borderRadius: "24px",
    boxShadow: "0px 8px 32px 0px rgba(0, 0, 0, 0.08)",
    textAlign: "center",
    height: "100%",
    transition: "all 0.5s",
    "& > p":{
      transition: "all 0.5s",
    },
    "& > img":{
      transition: "all 0.5s",
    },
    "&:hover": {
      transform: 'scaleX(0.8)',
      border: '1px solid #00ACEE',
      "& > p":{
        transform: 'scaleX(1.2)',
        color: theme.palette.secondary.main
      },
      "& > img":{
        transform: 'scaleX(1.2)',
      }
    }
  }))

  return (
    <Box maxWidth={1140} margin="50px auto 0 auto" padding={{ xs: "0 25px" }}>
      <Grid width="100%" container spacing={{ xs: 3, md: 4 }} marginBottom='50px'>
        <Grid item xs={12} md={6}>
          <Typography
            variant="h2"
            fontWeight={900}
            fontSize={{ xs: 38, md: 40 }}
            color={theme.palette.primary.main}
          >
            {course.title_course}
          </Typography>
          <Typography color="#111929" fontSize="16px" sx={{ mt: 5 }}>
            {parse(courseAbout)}
          </Typography>
          <Box display="flex" mt={5}>
            {isItemInCart ?
              <Button variant="outlined" onClick={() => navigate('/buyCourse')} sx={{ borderRadius: "50px", ml: 3, border: "1px solid", fontSize: 19, fontWeight: 600, padding: "10px 32px" }}> نمایش سبد خرید</Button> :
              <Button variant="contained" onClick={sendCourse} sx={{ borderRadius: "50px", ml: 3, fontSize: 19, fontWeight: 600, padding: "10px 32px" }}> افزودن به سبد سفارش</Button>
            }
            <Button
              variant="outlined"
              sx={{ borderRadius: "50px", border: "1px solid", fontSize: 19, fontWeight: 600, padding: "10px 32px" }}
            >
              مشاهده سر فصل ها
            </Button>
          </Box>
        </Grid>
        <Grid item xs={12} md={6}>
          <img
            height={350}
            width="100%"
            alt=""
            src={img1}
            style={{ objectFit: "contain" }}
          />
        </Grid>
      </Grid>
      <Grid
        width="100%"
        container
        spacing={{ xs: 3, md: 4 }}
      >
        <Grid item xs={6} md={3}>
          <CardBox>
            <img
              width={48}
              alt="icon1"
              src={icon1}
              style={{ marginTop: "-24px" }}
            />
            <Typography
              fontWeight={700}
              color="#375288"
              fontSize="18px"
              sx={{ my: 3 }}
            >
              محتوای به روز
            </Typography>
          </CardBox>
        </Grid>
        <Grid item xs={6} md={3}>
          <CardBox>
            <img
              width={48}
              alt="icon1"
              src={icon2}
              style={{ marginTop: "-24px" }}
            />
            <Typography
              fontWeight={700}
              color="#375288"
              fontSize="18px"
              sx={{ my: 3 }}
            >
              اساتید با تجربه
            </Typography>
          </CardBox>
        </Grid>
        <Grid item xs={6} md={3}>
          <CardBox>
            <img
              width={48}
              alt="icon1"
              src={icon3}
              style={{ marginTop: "-24px" }}
            />
            <Typography
              fontWeight={700}
              color="#375288"
              fontSize="18px"
              sx={{ my: 3 }}
            >
              گواهینامه معتبر
            </Typography>
          </CardBox>
        </Grid>
        <Grid item xs={6} md={3}>
          <CardBox>
            <img
              width={48}
              alt="icon1"
              src={icon4}
              style={{ marginTop: "-24px" }}
            />
            <Typography
              fontWeight={700}
              color="#375288"
              fontSize="18px"
              sx={{ my: 3 }}
            >
              پشتیبانی یک ساله
            </Typography>
          </CardBox>
        </Grid>
      </Grid>
    </Box>
  );
};

export default CourseDetailsSectionHeader;
