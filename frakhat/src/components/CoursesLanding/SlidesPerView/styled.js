import { Grid, styled } from "@mui/material"

export const SlidesPerViewContainer = styled(Grid)(({ theme }) => ({
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
    margin: "100px auto 0 auto",
    "& > div": {
        paddingTop: 40,
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
        }
    },
    "& .my_Swiper": {
        width: '100%',
        height: 150,
    },
    "& .my_Swiper .swiper_slide": {
        background: '#fff',
        display: 'flex',
        alignItems: 'center',
        width: "400px !important",
        height: "75px !important",
        fontSize: 14,
        lineHeight: 28,
        color: '#000000',
        boxShadow: '0px 4px 48px 0px rgba(0, 0, 0, 0.07)',
        borderRadius: 24,
        padding: 20,
        gap: 10,
        "& > div": {
            position: 'relative',
            background: '#EEF2F8',
            borderRadius: 8,
            width: 44,
            height: 44,
            "& > img ": {
                position: 'absolute',
                width: "29px !important",
                height: "29px !important",
                top: 8,
                right: 7,
            },
        },
        "& > p ":{
            color: theme.palette.primary.main,
            fontSize: 14
        }
    },
}))