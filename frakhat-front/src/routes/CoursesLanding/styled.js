import { Grid, styled } from "@mui/material";

export const CoursesLandingContainer = styled(Grid)(({ theme }) => ({
    [theme.breakpoints.down('lg')]:{
        padding: '0 25px'
    }
}))