import React from "react";
import { Box, Button, Grid, Typography } from "@mui/material";
import { useTheme } from "@mui/material";
import img1 from "../../../assets/images/hamrah aval.png";
import icon1 from "../../../assets/icons/wallet-minus.svg";
import icon2 from "../../../assets/icons/location2.svg";
const CoursDetailsJobSearch = () => {
  const theme = useTheme();
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
          کاریابی فراخط
        </Typography>
      </Box>
      <Box my={3} display="flex" justifyContent="center">
        <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:36 , md:40}}
          display='inline'
          color={theme.palette.primary.main}
        >
          موقعیت شغلی
          &nbsp;
          <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:36 , md:40}}
          display='inline'
          color={theme.palette.secondary.main}
        >
          متناسب با دوره
        </Typography>
        </Typography>
      </Box>
      <Grid width="100%" container spacing={3}>
        <Grid item xs={6} md={3}>
          <Box
            borderRadius="12px"
            sx={{ boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)" }}
            height="100%"
          >
            <img alt="" src={img1} width="100%" height={150} />
            <Box p={2}>
              <Typography fontSize="14px">همراه اول</Typography>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon1} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  16 ملیون تومن
                </Typography>
              </Box>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon2} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  تهران
                </Typography>
              </Box>
            </Box>
          </Box>
        </Grid>
        <Grid item xs={6} md={3}>
          <Box
            borderRadius="12px"
            sx={{ boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)" }}
            height="100%"
          >
            <img alt="" src={img1} width="100%" height={150} />
            <Box p={2}>
              <Typography fontSize="14px">همراه اول</Typography>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon1} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  16 ملیون تومن
                </Typography>
              </Box>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon2} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  تهران
                </Typography>
              </Box>
            </Box>
          </Box>
        </Grid>
        <Grid item xs={6} md={3}>
          <Box
            borderRadius="12px"
            sx={{ boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)" }}
            height="100%"
          >
            <img alt="" src={img1} width="100%" height={150} />
            <Box p={2}>
              <Typography fontSize="14px">همراه اول</Typography>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon1} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  16 ملیون تومن
                </Typography>
              </Box>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon2} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  تهران
                </Typography>
              </Box>
            </Box>
          </Box>
        </Grid>
        <Grid item xs={6} md={3}>
          <Box
            borderRadius="12px"
            sx={{ boxShadow: "0px 4px 48px 0px rgba(0, 0, 0, 0.07)" }}
            height="100%"
          >
            <img alt="" src={img1} width="100%" height={150} />
            <Box p={2}>
              <Typography fontSize="14px">همراه اول</Typography>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon1} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  16 ملیون تومن
                </Typography>
              </Box>
              <Box mt={2} display="flex" alignItems="center">
                <img alt="" src={icon2} />
                <Typography fontSize="14px" sx={{ mr: 1 }}>
                  تهران
                </Typography>
              </Box>
            </Box>
          </Box>
        </Grid>
      </Grid>
      <Box mt={5} textAlign="center">
        <Button
          variant="contained"
          sx={{ borderRadius: "50px", height: "45px" }}
        >
          مشاهده همه فرصت های شفلی
        </Button>
      </Box>
    </Box>
  );
};

export default CoursDetailsJobSearch;
