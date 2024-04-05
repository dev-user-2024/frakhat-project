import React from "react";
import { Box, Typography, Grid } from "@mui/material";
import { useTheme } from "@mui/material";
import icon1 from "../../../assets/icons/cours-info1.png";
import icon2 from "../../../assets/icons/cours-info2.png";
import icon3 from "../../../assets/icons/cours-info3.png";
const CourseDetailsInfo = () => {
  const theme = useTheme();
  return (
    <Box
      p={4}
      sx={{
        background: "#EEF2F8",
        marginTop: "100px",
      }}
    >
      <Box sx={{ maxWidth: "1140px", margin: "0 auto", textAlign: "center" }} padding={{ xs: "0 25px" }}>
        <Grid container spacing={4}>
          <Grid item xs={12} md={4}>
            <Box textAlign="center">
              <img alt="" src={icon1} />
              <Typography
                fontWeight={700}
                fontSize="24px"
                color={theme.palette.primary.main}
                sx={{ mt: 2 }}
              >
                زمان برگزاری
              </Typography>
              <Typography sx={{ mt: 2 }}>10 خرداد</Typography>
              <Typography >الی 15 خرداد</Typography>
            </Box>
          </Grid>
          <Grid item xs={12} md={4}>
          <Box textAlign="center">
            <img alt="" src={icon2} />
            <Typography
              fontWeight={700}
              fontSize="24px"
              color={theme.palette.primary.main}
              sx={{ mt: 2 }}
            >
              محتوا
            </Typography>
            <Typography sx={{ mt: 2 }}>+40</Typography>
            <Typography >ساعت آموزش ویدیوی</Typography>
          </Box>
        </Grid>
        <Grid item xs={12} md={4}>
        <Box textAlign="center">
          <img alt="" src={icon3} />
          <Typography
            fontWeight={700}
            fontSize="24px"
            color={theme.palette.primary.main}
            sx={{ mt: 2 }}
          >
            شهریه
          </Typography>
          <Typography sx={{ mt: 2 }}>یک ملیون ودویست</Typography>
          <Typography >هزار تومان</Typography>
        </Box>
      </Grid>
        </Grid>
      </Box>
    </Box>
  );
};

export default CourseDetailsInfo;
