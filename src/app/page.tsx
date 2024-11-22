"use client";
import React, { useEffect, useState } from "react";
import { API_URL, initBgChangeOnMousemove } from "@/lib/utils";
import LangSwitcher from "@/components/buttons/LangSwitcher";
import { useCookies } from "react-cookie";
import Loader from "@/components/utils/loader";

export default function Home() {
  const [cookies] = useCookies(["locale"]);
  const [pageContent, setPageContent] = useState(null);
  useEffect(() => {
    initBgChangeOnMousemove();
    async function fetchPageContent() {
      const res = await fetch(`${API_URL}/pageContent`, {
        cache: "no-store",
      });
      const data = await res.json();
      setPageContent(data);
    }
    fetchPageContent();
  }, [cookies.locale]);

  if (!pageContent) return <Loader />;

  return (
    <div className="p-16 flex flex-col">
      <main>
        <LangSwitcher />
        <div className="grid md:grid-cols-homeLayout lg:grid-cols-2 md:grid-rows-homeLayout justify-start items-start">
          <div className="p-4 md:col-start-1 md:col-span-2 lg:col-span-1">
            <h1 className="text-6xl font-serif">{pageContent.title}</h1>
          </div>
          <div className="p-4 md:col-start-1 md:col-end-1 lg:row-start-auto">
            <p className="mt-4">{pageContent.job_title}</p>
            <p className="mt-6 text-material-light">
              {pageContent.catch_phrase}
            </p>
          </div>
          <div
            className="p-4 text-material-light md:col-start-2 md:col-end-2 lg:row-start-1 lg:row-span-2"
            dangerouslySetInnerHTML={{ __html: pageContent.description }}
          ></div>
        </div>
      </main>
      {/* <footer> TODO : Footer</footer> */}
    </div>
  );
}
