import { Box, Typography } from "@mui/material";
import React from "react";
import { useTheme } from "@mui/material";
import {
  Accordion,
  AccordionDetails,
  AccordionSummary,
  Grid,
} from "@mui/material";
import arrow from "../../../assets/icons/CoursesLanding-arrowdown2arrowdown.svg";
const CourseDetailsQuestion = () => {
  const theme = useTheme();
  return (
    <Box maxWidth={1140} margin="150px auto 0 auto" padding={{ xs: "0 25px" }}>
      <Box my={3} display="flex" justifyContent="center">
        <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:38,md:40}}
          display='inline'
          color={theme.palette.primary.main}
        >
          سوالات
          &nbsp;
          <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:38,md:40}}
          display='inline'
          color={theme.palette.secondary.main}
        >
          متداول
        </Typography>
        </Typography>
        
      </Box>
      <Grid>
        <Grid marginTop={2}>
          <Accordion>
            <AccordionSummary expandIcon={<img src={arrow} />}>
              <p>چطور میتوانیم مدرک خود را دریافت کنیم؟</p>
            </AccordionSummary>
            <AccordionDetails>
              <p>
                دوره های کاربردی فراخط با هدف ورود به بازار کار تهیه شده اند،
                شما با ثبت نام در دوره های کاربردی فراخط آماده حضور در بازار کار
                خواهید شد. دوره های کاربردی فراخط با بروزترین متدهای دنیا برگزار
                می شوند: هیبریدی بودن دوره ها بصورتی است که یک بخش از کلاس بصورت
                ویدیوهای آفلاین در اختیار شما قرار می گیرند
              </p>
            </AccordionDetails>
          </Accordion>
        </Grid>
        <Grid marginTop={2}>
          <Accordion>
            <AccordionSummary expandIcon={<img src={arrow} />}>
              <p>چطور میتوانیم مدرک خود را دریافت کنیم؟</p>
            </AccordionSummary>
            <AccordionDetails>
              <p>
                دوره های کاربردی فراخط با هدف ورود به بازار کار تهیه شده اند،
                شما با ثبت نام در دوره های کاربردی فراخط آماده حضور در بازار کار
                خواهید شد. دوره های کاربردی فراخط با بروزترین متدهای دنیا برگزار
                می شوند: هیبریدی بودن دوره ها بصورتی است که یک بخش از کلاس بصورت
                ویدیوهای آفلاین در اختیار شما قرار می گیرند
              </p>
            </AccordionDetails>
          </Accordion>
        </Grid>
        <Grid marginTop={2}>
          <Accordion>
            <AccordionSummary expandIcon={<img src={arrow} />}>
              <p>چطور میتوانیم مدرک خود را دریافت کنیم؟</p>
            </AccordionSummary>
            <AccordionDetails>
              <p>
                دوره های کاربردی فراخط با هدف ورود به بازار کار تهیه شده اند،
                شما با ثبت نام در دوره های کاربردی فراخط آماده حضور در بازار کار
                خواهید شد. دوره های کاربردی فراخط با بروزترین متدهای دنیا برگزار
                می شوند: هیبریدی بودن دوره ها بصورتی است که یک بخش از کلاس بصورت
                ویدیوهای آفلاین در اختیار شما قرار می گیرند
              </p>
            </AccordionDetails>
          </Accordion>
        </Grid>
        <Grid marginTop={2}>
          <Accordion>
            <AccordionSummary expandIcon={<img src={arrow} />}>
              <p>چطور میتوانیم مدرک خود را دریافت کنیم؟</p>
            </AccordionSummary>
            <AccordionDetails>
              <p>
                دوره های کاربردی فراخط با هدف ورود به بازار کار تهیه شده اند،
                شما با ثبت نام در دوره های کاربردی فراخط آماده حضور در بازار کار
                خواهید شد. دوره های کاربردی فراخط با بروزترین متدهای دنیا برگزار
                می شوند: هیبریدی بودن دوره ها بصورتی است که یک بخش از کلاس بصورت
                ویدیوهای آفلاین در اختیار شما قرار می گیرند
              </p>
            </AccordionDetails>
          </Accordion>
        </Grid>
        <Grid marginTop={2}>
          <Accordion>
            <AccordionSummary expandIcon={<img src={arrow} />}>
              <p>چطور میتوانیم مدرک خود را دریافت کنیم؟</p>
            </AccordionSummary>
            <AccordionDetails>
              <p>
                دوره های کاربردی فراخط با هدف ورود به بازار کار تهیه شده اند،
                شما با ثبت نام در دوره های کاربردی فراخط آماده حضور در بازار کار
                خواهید شد. دوره های کاربردی فراخط با بروزترین متدهای دنیا برگزار
                می شوند: هیبریدی بودن دوره ها بصورتی است که یک بخش از کلاس بصورت
                ویدیوهای آفلاین در اختیار شما قرار می گیرند
              </p>
            </AccordionDetails>
          </Accordion>
        </Grid>
      </Grid>
    </Box>
  );
};

export default CourseDetailsQuestion;
