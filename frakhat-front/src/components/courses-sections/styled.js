import { Grid, styled } from "@mui/material";

export const coursesSections = styled(Grid)(({ theme }) => ({
    maxWidth: 1141,
    gap: 20,
    margin: '0 auto',
    '& .coursesContainer': {
        display: 'flex',
        marginTop: 50,
    },
    [theme.breakpoints.down("lg")]: {
        padding: '0 25px',
    }

}))
