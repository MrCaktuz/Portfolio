"use client";
import React, { useEffect, useState } from "react";
import { API_URL, initBgChangeOnMousemove, scrollObserver } from "@/lib/utils";
import LangSwitcher from "@/components/buttons/LangSwitcher";
import { useCookies } from "react-cookie";
import Loader from "@/components/utils/loader";
import PostSection from "@/components/posts/Section";
import BrandLogo from "@/components/icons/BrandLogo";
import PageNav from "@/components/navs/PageNav";

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
  }, [pageContent, sections]);

  return (
    <>
      <Loader className={`show ${pageContent ? "fadeOut" : ""}`} />
      <div
        className={`hide ${pageContent ? "fadeIn" : ""} max-w-7xl my-0 mx-auto flex flex-col`}
      >
        <main className="p-5 pt-10 md:p-12 md:pt-24 lg:p-16 lg:pt-32 lg:flex-shrink lg:flex-grow">
          <LangSwitcher />
          <div className="grid gap-10 md:grid-cols-homeLayout md:grid-rows-homeLayout">
            <div className="flex justify-center col-start-1 col-span-2 md:justify-end md:col-span-1">
              <BrandLogo
                className="size-40 shadow-lg"
                locale={cookies.locale}
              />
            </div>
            <div className="col-span-2 md:col-start-2 md:col-span-1 md:self-center">
              <h1 className="w-full text-3xl md:w-auto md:text-5xl">
                {pageContent?.title}
              </h1>
              <p className="text-material-light">{pageContent?.subtitle}</p>
            </div>
            <div className="hidden sticky justify-end top-20 col-span-2 md:inline-block md:col-start-1 md:col-end-1 md:self-start">
              <PageNav sections={sections} />
            </div>
            <div className="row-span-3 pt-3 md:col-start-2 md:col-end-2">
              <div className="section_services relative mb-20">
                <h2 className="text-xl pb-4 mb-4 relative uppercase tracking-wider after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-material-blue">
                  What do you need&nbsp;?
                </h2>
                <div className="grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
                  <div className="observedElements right p-5 md:p-8 border border-material shadow-lg bg-material-dark">
                    <h3 className="font-sertext-lg mb-5 font-bold">
                      A Front-End Dev&nbsp;?
                    </h3>
                    <p>
                      I can jump in and adapt to your stack in no time, whether
                      you already have a web app or need me to create one from
                      scratch.
                    </p>
                  </div>
                  <div className="observedElements right p-5 md:p-8 border border-material shadow-lg bg-material-dark">
                    <h3 className="font-sertext-lg mb-5 font-bold">
                      A Team Leader&nbsp;?
                    </h3>
                    <p>
                      My leadership, communication skills, and technical
                      background make me the perfect fit to lead a team to
                      success.
                    </p>
                  </div>
                  <div className="observedElements right p-5 md:p-8 border border-material shadow-lg bg-material-dark">
                    <h3 className="font-sertext-lg mb-5 font-bold">
                      An Accessibility Expert&nbsp;?
                    </h3>
                    <p>
                      Today’s web must be accessible to everyone. I can analyze
                      your website to provide tips and upgrades for a better
                      level of accessibility for a better UX.
                    </p>
                  </div>
                  <div className="observedElements right p-5 md:p-8 border border-material shadow-lg bg-material-dark">
                    <h3 className="font-sertext-lg mb-5 font-bold">
                      An integrator&nbsp;?
                    </h3>
                    <p>
                      My attention to detail and meticulous mind make me a
                      perfect fit to integrate even the most complex designs.
                      From screens to complete design systems, I do it all.
                    </p>
                  </div>
                </div>
              </div>
              {posts &&
                Object.keys(posts).map((sectionKey) => (
                  <PostSection
                    key={sectionKey}
                    section={sectionKey}
                    posts={posts[sectionKey]}
                  />
                ))}
            </div>
          </div>
        </main>
      </div>
    </>
  );
}
