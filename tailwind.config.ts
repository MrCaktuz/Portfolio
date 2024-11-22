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
      colors: {
        material: {
          white: "#EDF0F2",
          orange: "#FF9721",
          light: "#879BA6", // "#78909C",
          DEFAULT: "#37474F",
          dark: "#263238",
        },
      },
      gridTemplateColumns: {
        homeLayout: "30% 1fr",
      },
      gridTemplateRows: {
        homeLayout: "auto 1fr",
      },
    },
  },
  plugins: [],
} satisfies Config;
