import React from "react";
import { LuMenu, LuX } from "react-icons/lu";
import LangSwitcher from "../buttons/LangSwitcher";
import { SectionType } from "@/lib/types";
import PageNav from "./PageNav";

const FixedNav = ({
  sections,
  className,
}: {
  sections: SectionType[];
  className: string;
}) => {
  return (
    <div className={`${className}`}>
      <div className="fixed top-0 right-0 z-40 flex flex-col items-end">
        <LangSwitcher className="hidden md:block bg-material rounded-full rounded-tr-none " />
        <details className="md:hidden group peer bg-material rounded-full rounded-tr-none ">
          <summary className="flex cursor-pointer size-12 p-3 relative z-50">
            <LuX
              className={`opacity-0 group-open:show absolute top-0 left-0 size-12 p-3 transition-opacity duration-700`}
            />
            <LuMenu
              className={`group-open:opacity-0 absolute top-0 left-0 size-12 p-3 transition-opacity duration-700`}
            />
          </summary>
        </details>
        <div className="grid grid-rows-[0fr] transition-[grid-template-rows] duration-700 peer-open:grid-rows-[1fr] bg-material rounded-2xl -translate-y-12">
          <div className="overflow-hidden">
            <div className="p-3 pt-12 pb-0">
              <PageNav sections={sections} mobile />
              <LangSwitcher className="w-full text-right rounded-none border-solid border-t border-material-dark mt-3" />
            </div>
          </div>
        </div>
      </div>
    </div>
    // <div
    //   className={`${className} ${open ? "size-auto" : "size-12"} bg-material flex justify-center items-center rounded-full rounded-tr-none fixed top-0 right-0 z-10 transition-all ease-in-out md:hover:bg-material-light md:hover:text-material-dark`}
    // >
    //   <LangSwitcher className="hidden md:block" />
    //   <div className="flex md:hidden">
    // <button
    //   className="size-12 p-3 relative rounded-full"
    //   onClick={onToggleMenu}
    // >
    //   <LuX
    //     className={`${open ? "opacity-1" : "opacity-0"} transition-opacity duration-700 size-full`}
    //   />
    //   <LuMenu
    //     className={`${open ? "opacity-0" : "opacity-1"} translate-y-[-100%] transition-opacity duration-700 size-full`}
    //   />
    // </button>
    //     <div
    //       className={`${open ? "translate-x-0" : "translate-x-[100%]"} absolute`}
    //     >
    //       <ul>
    //         <li>Page Nav</li>
    //         <li>Page Nav</li>
    //         <li>Page Nav</li>
    //       </ul>
    //     </div>
    //   </div>
    // </div>
  );
};

export default FixedNav;
