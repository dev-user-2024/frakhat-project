import { Grid, styled } from "@mui/material";

export const AboutCoursesContainer = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    margin: '0 auto',
    "& > div": {
        display: 'flex',
        justifyContent: 'space-between',
        flexWrap: 'wrap',
        margin: '40px auto 0 auto',
        "& .MuiBox-root": {
            width: 269,
            margin: '30px auto 0 auto',
            "& .MuiPaper-root": {
                position: 'relative',
                height: 140,
                borderRadius: 24,
                boxShadow: '0px 8px 32px 0px rgba(0, 0, 0, 0.08)',
                marginTop: 60,
                transition: 'all 0.7s',
                border: '0.5px solid #B2E6FA',
                "&:hover": {
                    transform: 'scaleX(0.8)',
                    border: '1px solid #00ACEE',
                    "& h5": {
                        transform: 'translateY(-3px)',
                        color: theme.palette.secondary.main,
                        fontSize: 18
                    },
                    "& img": {
                        transform: 'translateY(-5px)',
                    },
                },
                "& h5": {
                    textAlign: 'center',
                    width: "100%",
                    position: 'absolute',
                    bottom: 0,
                    fontSize: 16,
                    fontWeight: 600,
                    color: theme.palette.primary.main,
                    marginBottom: 15,
                    transition: 'all 0.7s',
                }
            },
            "&:nth-of-type(1)": {
                "& img": {
                    position: 'absolute',
                    top: -55,
                    right: 75,
                    transition: 'all 0.7s',
                },
            },
            "&:nth-of-type(2)": {
                "& img": {
                    position: 'absolute',
                    top: -55,
                    right: 36,
                    transition: 'all 0.7s',
                },
            },
            "&:nth-of-type(3)": {
                "& img": {
                    position: 'absolute',
                    top: -45,
                    right: 76,
                    transition: 'all 0.7s',
                },
            },
            "&:nth-of-type(4)": {
                "& img": {
                    position: 'absolute',
                    top: -45,
                    right: 43,
                    transition: 'all 0.7s',
                },
            },
        },
        "& > div": {
            "& > h2": {
                color: theme.palette.primary.main,
                fontSize: 32,
                fontWeight: 700,
                "& > span": {
                    color: theme.palette.secondary.main,
                }
            },
            "& > p": {
                color: theme.palette.black.main,
            },
            "& > img": {
                width: '100%',
                marginRight: 60,
            }
        },
        "& > div > div": {
            display: 'flex',
            alignItems: 'center',
            gap: 13,
            "& h3": {
                color: theme.palette.black.main,
                fontSize: 16,
            },
            "& >  p": {
                color: theme.palette.black.main,
                margin: '5px 10px 0 0',
            }
        },
        "& > div:nth-of-type(2)": {
            "& p": {
                color: theme.palette.black.main,
                margin: '5px 0 0 0 !important',
            },
            "& > div > div": {
                display: 'flex',
                justifyContent: 'center',
                alignItems: 'center',
                width: 66,
                height: 66,
                background: "#e6ecf6",
                borderRadius: 10,
                "& > img": {
                    width: 38,
                    height: 38,
                },
            }
        },
    },
    [theme.breakpoints.down('md')]: {
        "& > div": {
            "& > div": {
                "& > img": {
                    marginRight: 0,
                }
            },
            "& > div ": {
                margin: '30px auto',
                "& > div": {
                    flexDirection: 'column',
                }
            }
        },
    }
}))