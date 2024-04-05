import { Grid, styled } from "@mui/material";

export const QuestionsContainer = styled(Grid)(({theme}) => ({
    maxWidth: 1140,
    margin: "100px auto 0 auto",
    "& > div":{
        "& > h2": {
            textAlign: 'center',
            color: theme.palette.primary.main,
            fontSize: 40,
            fontWeight: 700,
            marginTop: 10,
            "& > span": {
                color: theme.palette.secondary.main
            }
        },
    }
}))