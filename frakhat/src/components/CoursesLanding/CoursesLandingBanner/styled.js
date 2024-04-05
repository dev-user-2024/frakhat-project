import { Grid, styled } from "@mui/material";

export const CoursesLandingBanner = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    display: "flex",
    alignItems: "center",
    margin: "0 auto",
    paddingTop: 100,
    "& .banner-title": {
        display: 'flex',
        flexDirection: 'column',
        gap: 30,
        "& h1": {
            color: theme.palette.primary.main,
            fontSize: 48,
            fontWeight: 900,
            lineHeight: '146%',
            "& > span": {
                color: '#00ACEE',
            },
        },
        "& p": {
            color: theme.palette.black.main,
            fontSize: 16,
            lineHeight: "32px",
        },
        "& > span": {
            color: theme.palette.gray1.main,
        },
        "& > div": {
            display: 'flex',
            gap: 20,
            "& > button": {
                padding: "10px 32px",
                borderRadius: 50,
                fontSize: 20,
            }
        },
    },
    "& > div ": {
        position: 'relative',
        width: 764,
        "img:nth-of-type(1)": {
            width: "100%"
        },
        "img:nth-of-type(2)": {
            position: 'absolute',
            width: '40%',
            right: 0,
            bottom: 50,
            animation: 'rocket 3s ease-in-out infinite'
        },
        "img:nth-of-type(3)": {
            position: 'absolute',
            width: '32%',
            left: -6,
            bottom: 120,
            animation: 'rocket 3s ease-in-out infinite'
        },
        '@keyframes rocket': {
            '0%': {
                transform: 'translateY(0)'
            },
            '50%': {
                transform: 'translateY(-18px)'
            },
            '100%': {
                transform: 'translateY(0)'
            }
        }
    },

    [theme.breakpoints.down('md')]: {
        paddingTop: 30,
        "& .banner-title": {
            textAlign: 'center',
            "& > div": {
                justifyContent: 'center',
                flexWrap: 'wrap',
                "& > button": {
                    fontSize: 14,
                }
            },
        },
        "& > div": {
            display: 'flex',
            justifyContent: 'center',
            marginTop: 60,
            "& > img": {
                width: "90%"
            }
        },
    },
    [theme.breakpoints.down('sm')]: {
        "& .banner-title": {
            "& h1": {
                fontSize: 38,
            },
            "& p": {
                fontSize: 15,
            },
            "& > div": {
                "& > button": {
                    width: "100%",
                }
            },
        },
        "& > div ": {
            "img:nth-of-type(1)": {
                marginTop: 0,
                width: "100%"
            },
            "img:nth-of-type(2)": {
                bottom: 20,
            },
            "img:nth-of-type(3)": {
                bottom: 60,
            },
        },
    }
}))