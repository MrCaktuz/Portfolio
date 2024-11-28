import React from "react";
import StylesIcons from "@/styles/icons.module.css";
import BrandLogo from "../icons/BrandLogo";

const Loader = ({ isLoaded }: { isLoaded: boolean }) => {
  return (
    <BrandLogo
      className={`opacity-0 ${StylesIcons.brand} ${isLoaded ? StylesIcons.brandLoaded : StylesIcons.brandLoading} z-10 size-40 shadow-lg`}
    />
  );
};

export default Loader;
