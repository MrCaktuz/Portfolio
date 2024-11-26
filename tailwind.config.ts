import type { Config } from "tailwindcss";

export default {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    fontFamily: {
      sans: ["Lato", "Graphik", "sans-serif"],
      serif: ["Georgia", "Merriweather", "serif"],
    },
    extend: {
      baseTransition: "var(--transition-base)",
      colors: {
        material: {
          white: "var(--color-material-white)", //"#EDF0F2",
          orange: "var(--color-material-orange)", // "#FF9721",
          blue: "var(--color-material-blue)", // "##99DBF6",
          light: "var(--color-material-light)", // "#879BA6", // "#78909C",
          DEFAULT: "var(--color-material)", // "#37474F",
          dark: "var(--color-material-dark)", // "#263238",
        },
      },
      gridTemplateColumns: {
        homeLayout: "30% 1fr",
      },
      gridTemplateRows: {
        homeLayout: "auto auto 1fr",
      },
    },
  },
  plugins: [],
} satisfies Config;
