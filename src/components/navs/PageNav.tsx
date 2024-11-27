import React from "react";
import stylesNav from "@/styles/nav.module.css";
import { useCookies } from "react-cookie";
import { SectionType } from "@/lib/types";

const PageNav = ({ sections }: { sections: SectionType[] }) => {
  const [cookies] = useCookies(["locale"]);

  return (
    <nav className={stylesNav.mainNav} aria-labelledby="mainmenulabel">
      <h2 id="mainmenulabel" className="sr-only">
        Navigation
      </h2>
      <ul className="flex flex-col justify-end">
        {sections &&
          sections.map((section) => (
            <li
              key={section._id}
              className="observedElements left flex justify-end"
            >
              <a
                href={`#section_${section.section_id}`}
                className="p-3 text-material-white bold relative transition-all ease-in-out"
              >
                {section[`nav_${cookies.locale}`]}
              </a>
            </li>
          ))}
        {/* <li className="flex justify-end">
          <a
            href="#section_services"
            className="p-3 text-material-white bold relative transition-all ease-in-out"
          >
            Services
          </a>
        </li>
        <li className="flex justify-end">
          <a
            href="#section_works"
            className="p-3 text-material-white bold relative transition-all ease-in-out"
          >
            Works
          </a>
        </li>
        <li className="flex justify-end">
          <a
            href="#section_qualifications"
            className="p-3 text-material-white bold relative transition-all ease-in-out"
          >
            Qualifications
          </a>
        </li> */}
      </ul>
    </nav>
  );
};

export default PageNav;
