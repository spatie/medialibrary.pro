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
            black: "#000",
            blue: {
                50: "#eae8f4",
                100: "#e4e2ed",
                200: "#bbb7ce",
                300: "#a9a5bf",
                400: "#9a97af",
                500: "#4d457c",
                600: "#514982",
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
                200: "#eae9e8",
                300: "#d1cec9",
                400: "#b7b4b0",
                500: "#898784",
                600: "#6b6966",
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
                hard: "5px 5px 0 rgba(0,0,0,0.05)",
                "hard-xl": "1em 1em 0 0px rgba(0,0,0,0.05), 2em 2em 0 0px rgba(0,0,0,0.05)"
            },
            letterSpacing: {
                logo: ".25em"
            },
            minHeight: {
                10: "2.5rem"
            },
            fontSize: {
                "xxs" : "0.6rem"
            },
            backgroundColor: {
                'inherit' : 'inherit'
            },
            spacing: {
                "1-em": "0.5em",
                "5-em": "1.25em",
            }
        }
    },
    variants: {
        boxShadow: ["responsive", "hover", "focus", "focus-within"],
        backgroundColor: ["responsive", "hover", "focus", "group-hover"],
        translate: ({ after }) => after(['group-hover']),
        opacity: ({ after }) => after(['group-hover']),
        zIndex: ({ after }) => after(['hover']),
        textColor: ({ after }) => after(['group-hover']),
    }
};
