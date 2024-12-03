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

const LangSwitcher = ({ className }: { className: string }) => {
  const [cookies, setCookie] = useCookies(["locale"]);
  const [nextLocale, setNextLocale] = useState(
    getNextLocaleValue(cookies.locale) || "",
  );

  if (ENV.AVAILABLE_LANGS?.length !== 2) {
    return <></>;
  }

  useEffect(() => {
    setNextLocale(getNextLocaleValue(cookies.locale));
  }, [cookies.locale]);

  const switchLocale = () => {
    setCookie("locale", nextLocale);
  };

  return (
    <button
      className={`${className} size-12 p-3 bold uppercase rounded-full`}
      onClick={switchLocale}
    >
      {nextLocale}
    </button>
  );
};

export default LangSwitcher;
