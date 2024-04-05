import { ThemeProvider as MuiThemeProvider, createTheme } from "@mui/material/styles";
import { useMemo } from "react";

const ThemeProvider = ({ children }) => {
    const theme = useMemo(() => createTheme({
        palette: {
            primary: {
                main: '#375288',
            },
            secondary: {
                main: '#00ACEE',
            },
            error: {
                main: "#F34251",
            },
            warning: {
                main: "#F0AF00",
            },
            success: {
                main: "#32B626",
            },
            gray1: {
                main: "#375288",
            },
            black: {
                main: "#111929",
            },
            zinc: {
                light: "#3f3f46",
                main: "#27272a",
                dark: "#18181b",
            },
        },
        typography: {
            fontFamily: "YekanBakh",
        },
    }))
    return (
        <MuiThemeProvider theme={theme}>{children}</MuiThemeProvider>
    )
}

export default ThemeProvider

