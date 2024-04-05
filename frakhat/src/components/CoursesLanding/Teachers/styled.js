import { Grid, styled } from "@mui/material";

export const CoursesCategoryContainer = styled(Grid)(({ theme }) => ({
    maxWidth: 1140,
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    margin: "10px auto 0 auto",
    "& > div": {
        display: 'flex',
        justifyContent: 'space-between',
        flexWrap: 'wrap',
        "& > h2": {
            color: theme.palette.primary.main,
            fontSize: 40,
            fontWeight: 900,
            marginTop: 10,
            "& > span": {
                color: theme.palette.secondary.main
            }
        },
        "& > p": {
            maxWidth: 543,
            color: '#111929',
            fontSize: 16,
            fontWeight: 500,
            lineHeight: '32px',
        },
        "& > div": {
            width: 270,
            height: 405,
            background: '#fff',
            borderRadius: 12,
            overflow: 'hidden',
            margin: '100px auto 0 auto',
            boxShadow: '0px 4px 48px 0px rgba(0, 0, 0, 0.07)',
            "& > div": {
                display: 'flex',
                flexDirection: 'column',
                gap: 5,
                padding: 10,
                "& > h4": {
                    color: theme.palette.black.main,
                    fontSize: 14,
                },
                "& > p": {
                    color: theme.palette.black.main,
                    fontSize: 12,
                },
                "& > div": {
                    display: 'flex',
                    justifyContent: 'center',
                    gap: 30,
                    marginTop: 7,
                    "& > div": {
                        width: 28,
                        height: 28,
                        display: 'flex',
                        justifyContent: 'center',
                        alignItems: 'center',
                        borderRadius: 4,
                        background: "#EEF2F8",
                        "& > img":{
                            width: 24,
                            height: 24,
                        }
                    }
                }
            },
        }
    }
}))