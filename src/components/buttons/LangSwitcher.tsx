"use client";
import { ENV } from "@/lib/utils";
import React, { useEffect, useState } from "react";
import { useCookies } from "react-cookie";

const getNextLocaleValue = (cookieLocale) => {
  const availableLangs = [...ENV.AVAILABLE_LANGS];
  const currentLocaleIndex = availableLangs.indexOf(
    cookieLocale || ENV.DEFAULT_LANG,
  );
  availableLangs.splice(currentLocaleIndex, 1);
  return availableLangs[0];
};

const LangSwitcher = () => {
  const [cookies, setCookie] = useCookies(["locale"]);
  const [nextLocale, setNextLocale] = useState(
    getNextLocaleValue(cookies.locale) || "",
  );

  if (ENV.AVAILABLE_LANGS?.length !== 2) {
    return <></>;
  }

  useEffect(() => {
    setNextLocale(getNextLocaleValue(cookies.locale));
    // const availableLangs = [...ENV.AVAILABLE_LANGS];
    // const currentLocaleIndex = availableLangs.indexOf(cookies.locale);
    // availableLangs.splice(currentLocaleIndex, 1);
    // const nextValue = availableLangs[0];

    // setNextLocale(nextValue);
  }, [cookies.locale]);

  const switchLocale = () => {
    setCookie("locale", nextLocale);
  };

  return (
    <button
      className="bg-material p-2 rounded-bl-md absolute top-0 right-0 bold uppercase transition-all ease-in-out  hover:bg-material-light hover:text-material-dark"
      onClick={switchLocale}
    >
      {nextLocale}
    </button>
  );
};

export default LangSwitcher;
