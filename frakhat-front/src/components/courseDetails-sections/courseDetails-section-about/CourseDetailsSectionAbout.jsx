import { Box, Grid, Typography } from "@mui/material";
import React from "react";
import img1 from "../../../assets/images/courses-img.png";
import img2 from "../../../assets/images/courses-teacher.png";
import { useTheme } from "@mui/material";
import parse from "html-react-parser";
import DOMPurify from "dompurify";
const CourseDetailsSectionAbout = ({ course }) => {
  const theme = useTheme();

  const courseAbout = DOMPurify.sanitize(course.description_course, {
    USE_PROFILES: { html: true },
  });

  const teacherAbout = DOMPurify.sanitize(course.description_author, {
    USE_PROFILES: { html: true },
  });

  return (
    <Box maxWidth={1140} margin="100px auto 0 auto" padding={{ xs: "0 25px" }}>
      <Grid
        width="100%"
        container
        spacing={{ xs: 0, md: 4 }}
        marginBottom="100px"
      >
        <Grid item xs={12} md={6}>
          <Box textAlign='center'>
            <img alt="" src={img1} width="90%" />
          </Box>
        </Grid>
        <Grid item xs={12} md={6}>
          <Box my={3} display="flex">
            <Typography
              variant="h2"
              fontWeight={700}
              fontSize={{ xs: 32, }}
              color={theme.palette.primary.main}
              display='inline'
            >
              درباره دوره
              &nbsp;
              <Typography
                variant="h2"
                fontWeight={700}
                fontSize={{ xs: 32 }}
                color={theme.palette.secondary.main}
                display='inline'
              >
                {course.title_course}
              </Typography>
            </Typography>
          </Box>
          <Typography textAlign="right">
            {parse(courseAbout)}
          </Typography>
        </Grid>
      </Grid>
      <Grid width="100%" container spacing={{ xs: 0, md: 4 }}>
        <Grid item xs={12} md={6}>
          <Box my={3} display="flex">
            <Typography
              variant="h2"
              fontWeight={700}
              fontSize={32}
              color={theme.palette.primary.main}
              display='inline'
            >
              استاد
              &nbsp;
              <Typography
                variant="h2"
                fontWeight={700}
                fontSize={32}
                color={theme.palette.secondary.main}
                display='inline'
              >
                دوره
              </Typography>
            </Typography>
          </Box>
          <Typography textAlign="right">{parse(teacherAbout)}</Typography>
        </Grid>
        <Grid item xs={12} md={6} textAlign="left">
          <Box textAlign='center'>
            <img alt="" src={img2} width="90%" />
          </Box>
        </Grid>
      </Grid>
    </Box>
  );
};

export default CourseDetailsSectionAbout;
