"use client";
import React, { useEffect, useState } from "react";
import {
  API_URL,
  ENV,
  initBgChangeOnMousemove,
  scrollObserver,
} from "@/lib/utils";
import LangSwitcher from "@/components/buttons/LangSwitcher";
import { useCookies } from "react-cookie";
import PageNav from "@/components/navs/PageNav";
import Loader from "@/components/utils/Loader";
import ServiceCard from "@/components/posts/ServiceCard";

const setBrandPositionVariables = () => {
  const brandLogo = document.getElementById("brandLogo");
  const brandLogoContainer = brandLogo?.parentElement;
  const root = document.querySelector(":root");

  if (brandLogoContainer) {
    const position = brandLogoContainer.getBoundingClientRect();
    const containerCenterY = window.innerHeight / 2 - position.top;
    const containerHalfY = (position.bottom - position.top) / 2;
    const containerCenterX = window.innerWidth / 2 - position.left;
    const containerHalfX = (position.right - position.left) / 2;
    const top = `${containerCenterY - containerHalfY}px`;
    const left = `${containerCenterX - containerHalfX}px`;
    root.style.setProperty("--brand-position-top", top);
    root.style.setProperty("--brand-position-left", left);
    brandLogo.style.setProperty("opacity", "1");
  }
};

export default function Home() {
  const [cookies] = useCookies(["locale"]);
  const [pageContent, setPageContent] = useState(null);
  const [sections, setSections] = useState([]);
  const [posts, setPosts] = useState(null);

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

    async function fetchPosts() {
      const res = await fetch(`${API_URL}/posts`, {
        cache: "no-store",
      });
      const data = await res.json();
      const groupedData = Object.groupBy(data, ({ section_id }) => section_id);
      setPosts(groupedData);
    }
    fetchPosts();

    async function fetchSections() {
      const res = await fetch(`${API_URL}/sections`, {
        cache: "no-store",
      });
      const data = await res.json();
      setSections(data);
    }
    fetchSections();
  }, [cookies.locale]);

  useEffect(() => {
    const observedElements = document.querySelectorAll(".observedElements");
    scrollObserver(observedElements);
  }, [pageContent, posts, sections]);

  useEffect(() => {
    setBrandPositionVariables();
  }, []);

  return (
    <div className="max-w-7xl my-0 mx-auto flex flex-col">
      <main className="p-5 pt-10 md:p-12 md:pt-24 lg:p-16 lg:pt-32 lg:flex-shrink lg:flex-grow">
        <LangSwitcher className={`hide ${pageContent ? "fadeIn" : ""}`} />
        <div className="grid gap-10 grid-cols-2 md:grid-cols-homeLayout md:grid-rows-homeLayout">
          <div className="size-40 relative mx-auto flex justify-center col-start-1 col-span-2 md:justify-end md:col-span-1">
            <Loader isLoaded={!!pageContent} />
          </div>
          <div
            className={`hide ${pageContent ? "fadeIn" : ""} col-span-2 md:col-start-2 md:col-span-1 md:self-center`}
          >
            <h1 className="w-full text-3xl md:w-auto md:text-5xl">
              {pageContent?.title}
            </h1>
            <p className="text-material-light">{pageContent?.subtitle}</p>
          </div>
          <div
            className={`hide ${pageContent ? "fadeIn" : ""} hidden sticky justify-end top-20 col-span-2 md:inline-block md:col-start-1 md:col-end-1 md:self-start`}
          >
            <PageNav sections={sections} />
          </div>
          <div
            className={`hide ${pageContent ? "fadeIn" : ""} col-span-2 row-span-3 pt-3 md:col-start-2 md:col-end-2`}
          >
            {sections &&
              sections.map((section) => {
                return (
                  <div
                    key={section.section_id}
                    className="section_services relative mb-20"
                  >
                    <h2 className="text-2xl pb-2 mb-6 relative tracking-wider after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-material-blue">
                      {section[`title_${cookies.locale || ENV.DEFAULT_LANG}`]}
                    </h2>
                    {section.section_id === "services" &&
                      posts &&
                      Object.keys(posts).map((sectionKey) => {
                        if (sectionKey === section.section_id) {
                          return (
                            <div
                              key={`post_${sectionKey}`}
                              className="grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2"
                            >
                              {posts[sectionKey].map((post) => {
                                return (
                                  <ServiceCard key={post._id} post={post} />
                                );
                              })}
                            </div>
                          );
                        }
                      })}
                  </div>
                );
              })}
          </div>
        </div>
      </main>
    </div>
  );
}
