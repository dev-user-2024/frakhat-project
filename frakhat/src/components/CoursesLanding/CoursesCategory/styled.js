import { Grid, styled } from "@mui/material";

export const CoursesCategoryContainer = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    margin: "100px auto 0 auto",
    "& > div": {
        display: 'flex',
        justifyContent: 'space-between',
        flexWrap: 'wrap',
        "& > span": {
            padding: "10px 24px",
            background: "#E5F7FD",
            color: theme.palette.secondary.main,
            borderRadius: 58,
        },
        "& > h2": {
            color: theme.palette.primary.main,
            fontSize: 40,
            fontWeight: 700,
            marginTop: 10,
            "& > span": {
                color: theme.palette.secondary.main
            }
        },
        "& > div": {
            display: 'flex',
            flexDirection: 'column',
            justifyContent: 'space-between',
            width: 209,
            height: 228,
            background: '#fff',
            margin: '50px auto 0 auto',
            boxShadow: '0px 4px 48px 0px rgba(0, 0, 0, 0.07)',
            borderRadius: 24,
            padding: '20px 20px 40px 20px',
            "& > h4": {
                fontSize: 16,
                fontWeight: 600,
            },
            "& > span": {
                fontSize: 12,
                color: theme.palette.gray1.main
            },
            "& > img": {
                width: 48,
                height: 48,
                zIndex: 1,
            },
            "& > img:nth-of-type(1)": {
                position: 'absolute',
                width: 62,
                height: 56
            }
        }
    },
    "& > div:nth-of-type(4)": {
        marginTop: 50,
        "& > a > button": {
            borderRadius: 50,
            padding: '11px 24px',
            fontSize: 16,
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