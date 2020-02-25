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
            white: "var(--white)",
            black: "var(--black)",
            blue: {
                50: "var(--blue-50)",
                100: "var(--blue-100)",
                200: "var(--blue-200)",
                300: "var(--blue-300)",
                400: "var(--blue-400)",
                500: "var(--blue-500)",
                600: "var(--blue-600)",
                700: "var(--blue-700)",
                800: "var(--blue-800)",
                900: "var(--blue-900)"
            },
            green: {
                100: "var(--green-100)",
                200: "var(--green-200)",
                300: "var(--green-300)",
                400: "var(--green-400)",
                500: "var(--green-500)",
                600: "var(--green-600)",
                700: "var(--green-700)",
                800: "var(--green-800)",
                900: "var(--green-900)"
            },
            yellow: {
                100: "var(--yellow-100)",
                200: "var(--yellow-200)",
                300: "var(--yellow-300)",
                400: "var(--yellow-400)",
                500: "var(--yellow-500)",
                600: "var(--yellow-600)",
                700: "var(--yellow-700)",
                800: "var(--yellow-800)",
                900: "var(--yellow-900)"
            },
            red: {
                100: "var(--red-100)",
                200: "var(--red-200)",
                300: "var(--red-300)",
                400: "var(--red-400)",
                500: "var(--red-500)",
                600: "var(--red-600)",
                700: "var(--red-700)",
                800: "var(--red-800)",
                900: "var(--red-900)"
            },
            gray: {
                100: "var(--gray-100)",
                200: "var(--gray-200)",
                300: "var(--gray-300)",
                400: "var(--gray-400)",
                500: "var(--gray-500)",
                600: "var(--gray-600)",
                700: "var(--gray-700)",
                800: "var(--gray-800)",
                900: "var(--gray-900)"
            },
            light: {
                100: "var(--light-100)",
                200: "var(--light-200)",
                300: "var(--light-300)",
                400: "var(--light-400)",
                500: "var(--light-500)",
                600: "var(--light-600)",
                700: "var(--light-700)",
                800: "var(--light-800)",
                900: "var(--light-900)"
            },
            dark: {
                50: "var(--dark-50)",
                100: "var(--dark-100)",
                200: "var(--dark-200)",
                300: "var(--dark-300)",
                400: "var(--dark-400)",
                500: "var(--dark-500)",
                600: "var(--dark-600)",
                700: "var(--dark-700)",
                800: "var(--dark-800)",
                900: "var(--dark-900)"
            }
        },
        extend: {
            inset: {
                full: "100%"
            },
            boxShadow: {
                body: "0 0 50px rgba(0,0,0,.05)",
                focus: "0 2px 2px var(--gray-100)"
            },
            letterSpacing: {
                logo: ".35em"
            },
            minHeight: {
                10: "2.5rem"
            }
        }
    },
    variants: {
        boxShadow: ["responsive", "hover", "focus", "focus-within"],
        backgroundColor: ["responsive", "hover", "focus", "group-hover"]
    }
};
