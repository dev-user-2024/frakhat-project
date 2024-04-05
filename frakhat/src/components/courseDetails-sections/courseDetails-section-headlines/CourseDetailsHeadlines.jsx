import { Box, Typography } from "@mui/material";
import { useTheme } from "@mui/material";
import icon from "../../../assets/icons/timer.svg";
const CourseDetailsHeadlines = () => {
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
          سر فصل های دوره
        </Typography>
      </Box>
      <Box my={3} display="flex" justifyContent="center">
        <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:36, md:40}}
          color={theme.palette.primary.main}
          display='inline'
        >
          آنچه در این دوره
          &nbsp;
          <Typography
          variant="h2"
          fontWeight={700}
          fontSize={{xs:36, md:40}}
          color={theme.palette.secondary.main}
          display='inline'
        >
          خواهید آموخت
        </Typography>
        </Typography>
      </Box>
      <Box my={2} >
        <Box
          my={1}
          p={2}
          border="1px solid #B2E6FA"
          borderRadius="12px"
          sx={{ backgroundColor: "#fff" }}
          display="flex"
          justifyContent="space-between"
        >
          <Box  display="flex" justifyContent="space-between">
            <Typography>جلسه اول : </Typography>
            <Typography sx={{ mr: 3 }}>
              معرفی ایلسترتور و ابزارهای آن
            </Typography>
          </Box>
          <Box display="flex" justifyContent="space-between">
            <img alt="" src={icon} />
            <Typography sx={{ mr: 1 }}>30 دقیقه</Typography>
          </Box>
        </Box>
        <Box
          my={1}
          p={2}
          border="1px solid #B2E6FA"
          borderRadius="12px"
          sx={{ backgroundColor: "#fff" }}
          display="flex"
          justifyContent="space-between"
        >
          <Box display="flex" justifyContent="space-between">
            <Typography>جلسه اول : </Typography>
            <Typography sx={{ mr: 3 }}>معرفی xd</Typography>
          </Box>
          <Box display="flex" justifyContent="space-between">
            <img alt="" src={icon} />
            <Typography sx={{ mr: 1 }}>30 دقیقه</Typography>
          </Box>
        </Box>
        <Box
          my={1}
          p={2}
          border="1px solid #B2E6FA"
          borderRadius="12px"
          sx={{ backgroundColor: "#fff" }}
          display="flex"
          justifyContent="space-between"
        >
          <Box display="flex" justifyContent="space-between">
            <Typography>جلسه اول : </Typography>
            <Typography sx={{ mr: 3 }}>معرفی xd</Typography>
          </Box>
          <Box display="flex" justifyContent="space-between">
            <img alt="" src={icon} />
            <Typography sx={{ mr: 1 }}>30 دقیقه</Typography>
          </Box>
        </Box>
      </Box>
    </Box>
  );
};

export default CourseDetailsHeadlines;
