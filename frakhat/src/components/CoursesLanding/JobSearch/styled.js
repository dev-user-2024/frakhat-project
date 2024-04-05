import { Grid, styled } from "@mui/material";

export const JobSearchContainer = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    margin: "100px auto 0 auto",
    "& > div:nth-of-type(2)": {
        "& > div": {
            "& > span": {
                padding: "10px 24px",
                background: "#E5F7FD",
                color: theme.palette.secondary.main,
                borderRadius: 58,
            },
            "& > h2": {
                color: theme.palette.primary.main,
                fontSize: 32,
                fontWeight: 700,
                marginTop: 10,
                "& > span": {
                    color: theme.palette.secondary.main
                }
            },
            "& > p": {
                color: theme.palette.black.main,
            },
            "& > a > button": {
                borderRadius: 50,
                padding: '11px 24px',
                fontSize: 16,
                marginTop: 25,
            }
        },
    },
    [theme.breakpoints.down('md')]: {
        "& > div": {
            display: 'flex',
            flexDirection: 'column',
            alignItems: 'center',
        }
    },
    [theme.breakpoints.down('sm')]: {
        "& > div": {
            display: 'flex',
            flexDirection: 'column',
            alignItems: 'center',
            "& img": {
                width: "100%",
            },
            "& h2": {
                fontSize: 26,
            },
        }
    }
}))