import { Grid, styled } from "@mui/material"

export const SliderContainer = styled(Grid)(({ theme }) => ({
    width: 367,
    flexShrink: 0,
    background: '#EEF2F8',
    padding: '22px 18px 124px 19px',
    borderRadius: 10,
    marginBottom: 50,
    "& > h3": {
        fontSize: 20,
        fontWeight: 700,
        color: theme.palette.primary.main
    },
    "& > .MuiPaper-root": {
        background: '#EEF2F8',
        boxShadow: 'none',
        "& > .MuiAccordionSummary-root": {
            padding: 0,
        },
        "& .MuiAccordionSummary-content": {
            marginBottom: 4,
        },
        "& .MuiFormControlLabel-root": {
            margin: 0,
        },
        "& .MuiRadio-root": {
            paddingRight: 0,
        },
        "& h4": {
            color: theme.palette.black.main,
            fontWeight: 700,
            fontSize: 16,
        }
    },
    [theme.breakpoints.down('md')]: {
        display: 'none'
    }
})) 