import { Grid, styled } from "@mui/material";

export const OurGoalContainer = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    margin: "100px auto 0 auto",
    textAlign: 'center',
    "& > div": {
        display: 'flex',
        justifyContent: 'space-between',
        flexWrap: 'wrap',
        "& > h2": {
            color: theme.palette.primary.main,
            fontSize: 40,
            fontWeight: 700,
            marginTop: 10,
            "& > span": {
                color: theme.palette.secondary.main
            },
        },
        "& > p": {
            color: theme.palette.black.main,
            fontSize: 16,
        },
        "& > div": {
            width: 237,
            height: 322,
            margin: '55px auto 0 auto',
            "& > h5":{
                color: theme.palette.primary.main,
                fontSize: 16,
                margin: "7px 0",
            },
            "& > p":{
                color: theme.palette.black.main,
                fontSize: 14,
            }
        },
    },
    [theme.breakpoints.down('sm')]: {
        "& > div": {
            "& > h2": {
                fontSize: 34,
                textAlign: 'center',
            }
        }
    }
}))