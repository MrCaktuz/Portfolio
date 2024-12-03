import React from "react";
import stylesNav from "@/styles/nav.module.css";
import { useCookies } from "react-cookie";
import { SectionType } from "@/lib/types";
import { ENV } from "@/lib/utils";

const PageNav = ({
  sections,
  mobile,
}: {
  sections: SectionType[];
  mobile: boolean;
}) => {
  const [cookies] = useCookies(["locale"]);

  return (
    <nav
      className={mobile ? "" : stylesNav.mainNav}
      aria-labelledby="mainmenulabel"
    >
      <h2 id="mainmenulabel" className="sr-only">
        Navigation
      </h2>
      <ul className="flex flex-col justify-end">
        {sections &&
          sections.map((section) => (
            <li
              key={section._id}
              className={`${mobile ? "" : "observedElements left"} flex justify-end`}
            >
              <a
                href={`#section_${section.section_id}`}
                className={`${mobile ? "w-full text-right" : ""} p-3 text-material-white bold relative transition-all ease-in-out`}
              >
                {section[`nav_${cookies.locale || ENV.DEFAULT_LANG}`]}
              </a>
            </li>
          ))}
      </ul>
    </nav>
  );
};

export default PageNav;
