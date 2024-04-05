import { useContext, useEffect, useState } from "react";
import { Box, Typography, Button, styled } from '@mui/material';
import { useTheme } from "@mui/material";
import { useAuth } from "../../../hooks/useAuth";
import { CartContext } from "../../../providers/CartProvider";
import { useNavigate } from "react-router-dom";
import React from 'react';
import img1 from "../../../assets/images/Component 37.png"
const CourseDetailsCart = ({course}) => {
  const theme = useTheme();
  const { hasAuth, user } = useAuth();
  const { addToCart, cartItems } = useContext(CartContext)
  const [isItemInCart, setIsItemInCart] = useState(false);
  const navigate = useNavigate()

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

  const CourseDetailsCartContainer = styled(Box)(({theme}) => ({
    "& > img":{
      animation: 'rocket 2s ease-in-out infinite',
      '@keyframes rocket': {
        '0%': {
          transform: 'translateY(0)'
        },
        '50%': {
          transform: 'translateY(-15px)'
        },
        '100%': {
          transform: 'translateY(0)'
        }
      }
    }
  }))

  return (
    <CourseDetailsCartContainer maxWidth={1140} margin="150px auto 0 auto" textAlign='center'>
      <img alt='' src={img1} />
      <Box my={3} display="flex" justifyContent="center">
        <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{ xs: 36, md: 40 }}
          display='inline'
          color={theme.palette.primary.main}
        >
          شرکت در دوره
          &nbsp;
          <Typography
            variant="h2"
            fontWeight={700}
            fontSize={{ xs: 36, md: 40 }}
            display='inline'
            color={theme.palette.secondary.main}
          >
            فتوشاپ
          </Typography>
        </Typography>

      </Box>
      <Box mt={5} textAlign='center'>
        {isItemInCart ?
          <Button variant="outlined" onClick={() => navigate('/buyCourse')} sx={{ borderRadius: "50px", ml: 3, fontSize: 19, fontWeight: 600, padding: "10px 32px" }}> نمایش سبد خرید</Button> :
          <Button variant="contained" onClick={sendCourse} sx={{ borderRadius: "50px", ml: 3, fontSize: 19, fontWeight: 600, padding: "10px 32px" }}> افزودن به سبد سفارش</Button>
        }
      </Box>
    </CourseDetailsCartContainer>
  );
};

export default CourseDetailsCart;