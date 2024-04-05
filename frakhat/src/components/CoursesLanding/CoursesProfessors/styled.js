import { Grid, styled } from "@mui/material";

export const CoursesProfessorsContainer = styled(Grid)(({ theme }) => ({
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
            marginBottom: 20,
            "& > span": {
                color: theme.palette.secondary.main
            }
        },
        "& > div": {
            display: 'flex',
            flexDirection: 'column',
            alignItems: 'center',
            justifyContent: 'center',
            width: 254,
            height: 314,
            margin: '50px auto 0 auto',
            gap: 15,
            background: '#EEF2F8',
            transition: 'all 0.5s',
            "& > h5": {
                color: theme.palette.black.main,
                fontSize: 16,
                fontWeight: 500,
            },
            "& > span": {
                color: theme.palette.primary.main,
                fontSize: 14,
                fontWeight: 500,
                transition: 'all 0.5s',
            },
            "&:nth-of-type(1)": {
                borderRadius: 130
            },
            "&:nth-of-type(2)": {
                borderRadius: 130,
                borderBottomRightRadius: 0,
            },
            "&:nth-of-type(3)": {
                borderRadius: 130,
                borderBottomRightRadius: 0,
                borderBottomLeftRadius: 0,
            },
            "&:nth-of-type(4)": {
                borderTopLeftRadius: 130,
            },
            "&:hover": {
                background: '#E5F7FD',
                "& > span": {
                    color: theme.palette.secondary.main
                }
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