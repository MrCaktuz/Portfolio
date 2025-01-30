import React from "react";
import type { Metadata } from "next";
import "@/styles/globals.css";
import { ENV } from "@/lib/utils";

export const metadata: Metadata = {
  title: "Mathieu Claessens",
  description: "Portfolio of Mathieu Claessens Web developer Front-End",
  icons: {
    icon: {
      type: "image/png",
      sizes: "32x32",
      url: "/favicon/favicon-32x32.png",
    },
    other: [
      {
        rel: "icon",
        type: "image/png",
        url: "/favicon/favicon-16x16.png",
        sizes: "16x16",
      },
      {
        rel: "apple-touch-icon",
        url: "/favicon/apple-touch-icon.png",
        sizes: "180x180",
      },
    ],
  },
  manifest: "/favicon/site.webmanifest",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html
      lang={ENV.DEFAULT_LANG}
      className="bg-material-dark text-material-white break-words"
    >
      <head>
        <link
          href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700"
          rel="stylesheet"
        />
      </head>
      <body className="subpixel-antialiased">{children}</body>
    </html>
  );
}
