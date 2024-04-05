import { Grid, styled } from "@mui/material";

export const CoursesSectionCoursesContainer = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    margin: "0 auto",
    "& > div:nth-child(1)": {
        display: 'flex',
        justifyContent: 'space-between',
        padding: "10px 24px",
        "&  h4": {
            color: theme.palette.primary.main,
            fontSize: 14,
        }
    },
    "& > div:nth-child(2)": {
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
            position: 'relative',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'space-between',
            width: 367,
            height: 200,
            background: '#fff',
            margin: '0 auto 50px auto',
            boxShadow: '0px 4px 48px 0px rgba(0, 0, 0, 0.07)',
            borderRadius: 24,
            padding: 20,
            "& h4": {
                color: theme.palette.black.main,
                fontSize: 16,
                fontWeight: 500,
            },
            "& > div": {
                border: '2px dashed #EEF2F8',
                padding: 12,
                borderRadius: 24,
                transition: 'all 0.4s',
                "& > div": {
                    background: '#EEF2F8',
                    width: 110,
                    height: 110,
                    display: 'flex',
                    justifyContent: 'center',
                    alignItems: 'center',
                    borderRadius: 16,
                    transition: 'all 0.4s',
                    "& img": {
                        width: 72,
                        height: 72
                    },
                },
            },
            "&:hover": {
                "& > div": {
                    transform: 'rotate(-8deg)',
                    border: '2px dashed #E5F7FD',
                    "& > div": {
                        background: '#E5F7FD'
                    }
                }
            },
            "& > button": {
                position: 'absolute',
                bottom: 7,
                right: 7,
                padding: '17px 10px',
                borderRadius: 10,

            }
        },
    },
}))