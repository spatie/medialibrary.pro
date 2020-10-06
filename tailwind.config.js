module.exports = {
    important: true,
    theme: {
        fontFamily: {
            sans: [
                "Inter",
                "-apple-system",
                "BlinkMacSystemFont",
                '"Segoe UI"',
                "Roboto",
                '"Helvetica Neue"',
                "Arial",
                '"Noto Sans"',
                "sans-serif",
                '"Apple Color Emoji"',
                '"Segoe UI Emoji"',
                '"Segoe UI Symbol"',
                '"Noto Color Emoji"'
            ]
        },
        colors: {
            transparent: "transparent",
            white: "#fff",
            black: "#13034a",
            blue: {
                50: "#eae8f4",
                100: "#d4d0e1",
                200: "#a19bb7",
                300: "#938bae",
                400: "#716993",
                500: "#1288ff",
                600: "#0574e3",
                700: "#42376e",
                800: "#1d4a75",
                900: "#13034a",
            },
            green: {
                100: "#ebf9ea",
                200: "#c7f0bf",
                300: "#b6e4b3",
                400: "rgb(135, 202, 138)",
                500: "#5bba64",
                600: "#429b59",
                700: "#337c4d",
                800: "#235c41",
                900: "#133d35",
            },
            yellow: {
                100: "#f5f1e4",
                200: "#fde4a0",
                300: "#ffe375",
                400: "#fcc95c",
                500: "#ffca2b",
                600: "#da9215",
                700: "#995218",
                800: "#74431b",
                900: "#4f331d",
            },
            red: {
                100: "#f0e7e6",
                200: "#f0d2d1",
                300: "#de9fa6",
                400: "#cc6875",
                500: "#c42543",
                600: "#a93147",
                700: "#862f42",
                800: "#632c3d",
                900: "#402938",
            },
            gray: {
                100: "#f8f7f6",
                200: "#e5e3e1",
                300: "#b8b5b0",
                400: "#918f8b",
                500: "#6b6a67",
                600: "#575654",
                700: "#4f4e4c",
                800: "#3d3c3b",
                900: "#242323",
            },
        },
        extend: {
            inset: {
                full: "100%"
            },
            boxShadow: {
                logo: "5px 5px 0 var(--dark-100)"
            },
            letterSpacing: {
                logo: ".35em"
            },
            minHeight: {
                10: "2.5rem"
            },
            fontSize: {
                "xxs" : "0.6rem"
            }
        }
    },
    variants: {
        boxShadow: ["responsive", "hover", "focus", "focus-within"],
        backgroundColor: ["responsive", "hover", "focus", "group-hover"]
    }
};
