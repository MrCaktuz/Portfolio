"use client";
import React, { useEffect, useState } from "react";
import { API_URL, initBgChangeOnMousemove } from "@/lib/utils";
import LangSwitcher from "@/components/buttons/LangSwitcher";
import { useCookies } from "react-cookie";
import Loader from "@/components/utils/loader";
import PostSection from "@/components/posts/Section";
import BrandLogo from "@/components/icons/BrandLogo";
import styles from "@/styles/nav.module.css";

export default function Home() {
  const [cookies] = useCookies(["locale"]);
  const [pageContent, setPageContent] = useState(null);
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
    async function fetchPosts() {
      const res = await fetch(`${API_URL}/posts`, {
        cache: "no-store",
      });
      const data = await res.json();

      const groupedData = Object.groupBy(
        data,
        ({ section_title }) => section_title,
      );
      setPosts(groupedData);
    }
    fetchPosts();
    fetchPageContent();
  }, [cookies.locale]);

  if (!pageContent) return <Loader />;

  return (
    <div className="max-w-7xl my-0 mx-auto flex flex-col">
      <main className="p-5 pt-10 md:p-12 md:pt-24 lg:p-16 lg:pt-32 lg:flex-shrink lg:flex-grow">
        <LangSwitcher />
        <div className="grid gap-10 md:grid-cols-homeLayout md:grid-rows-homeLayout">
          <div className="flex justify-center col-start-1 col-span-2 md:justify-end md:col-span-1">
            <BrandLogo className="size-40" locale={cookies.locale} />
          </div>
          <div className="col-span-2 md:col-start-2 md:col-span-1 md:self-center">
            <h1 className="w-full text-3xl md:w-auto md:text-5xl">
              {pageContent?.title}
            </h1>
            <p className="text-material-light">{pageContent?.catch_phrase}</p>
          </div>
          <div className="hidden sticky justify-end top-20 col-span-2 md:inline-block md:col-start-1 md:col-end-1 md:self-start">
            <nav className={styles.mainNav} aria-labelledby="mainmenulabel">
              <h2 id="mainmenulabel" className="sr-only">
                Main Menu
              </h2>
              <ul className="flex flex-col justify-end">
                <li className="flex justify-end">
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
                </li>
              </ul>
            </nav>
          </div>
          <div className="row-span-3 pt-3 md:col-start-2 md:col-end-2">
            <div
              className="text-material-light"
              dangerouslySetInnerHTML={{ __html: pageContent?.description }}
            ></div>
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
  );
}
