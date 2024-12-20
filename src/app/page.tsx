"use client";
import React, { Suspense, useEffect, useState } from "react";
import {
  API_URL,
  ENV,
  initBgChangeOnMousemove,
  scrollObserver,
  sectionObserver,
} from "@/lib/utils";
import { useCookies } from "react-cookie";
import PageNav from "@/components/navs/PageNav";
import Loader from "@/components/utils/Loader";
import ServiceCard from "@/components/posts/ServiceCard";
import stylesPosts from "@/styles/posts.module.css";
import stylesNav from "@/styles/nav.module.css";
import PostCard from "@/components/posts/PostCard";
import FixedNav from "@/components/navs/FixedNav";
import {
  GroupedPostsType,
  PageContentType,
  PostType,
  SectionType,
} from "@/lib/types";

const setBrandPositionVariables = () => {
  const brandLogo = document.getElementById("brandLogo");
  const brandLogoContainer = brandLogo?.parentElement;
  const root = document.querySelector(":root") as HTMLElement;

  if (brandLogoContainer) {
    const position = brandLogoContainer.getBoundingClientRect();
    const containerCenterY = window.innerHeight / 2 - position.top;
    const containerHalfY = (position.bottom - position.top) / 2;
    const containerCenterX = window.innerWidth / 2 - position.left;
    const containerHalfX = (position.right - position.left) / 2;
    const top = `${containerCenterY - containerHalfY}px`;
    const left = `${containerCenterX - containerHalfX}px`;
    root?.style.setProperty("--brand-position-top", top);
    root?.style.setProperty("--brand-position-left", left);
    root?.style.setProperty("--brand-opacity", "1");
  }
};

export default function Home() {
  const [cookies] = useCookies(["locale"]);
  const [pageContent, setPageContent] = useState<PageContentType>();
  const [sections, setSections] = useState<SectionType[]>([]);
  const [posts, setPosts] = useState<GroupedPostsType>({});
  const titleKey =
    `title_${cookies.locale || ENV.DEFAULT_LANG}` as keyof SectionType;

  useEffect(() => {
    initBgChangeOnMousemove();

    async function fetchPageContent() {
      const res = await fetch(`${API_URL}/pageContent`);
      const data = await res.json();
      setPageContent(data);
    }
    fetchPageContent();

    async function fetchPosts() {
      const res = await fetch(`${API_URL}/posts`);
      const data = await res.json();
      const groupedData: GroupedPostsType = Object.groupBy(
        data,
        ({ section_id }: PostType) => section_id,
      );
      Object.keys(groupedData).forEach((key) => {
        groupedData[key] = groupedData[key] || []; // Replace undefined with an empty array
      });
      setPosts(groupedData);
    }
    fetchPosts();
  }, [cookies.locale]);

  useEffect(() => {
    async function fetchSections() {
      const res = await fetch(`${API_URL}/sections`);
      const data = await res.json();
      setSections(
        data.filter(
          (section: SectionType) => posts && posts[section.section_id],
        ),
      );
    }
    fetchSections();
  }, [posts]);

  useEffect(() => {
    const observedElements = document.querySelectorAll(".observedElements");
    scrollObserver(Array.from(observedElements));
    sectionObserver(stylesNav.active);
  }, [pageContent, posts, sections]);

  useEffect(() => {
    setBrandPositionVariables();
  }, []);

  return (
    <Suspense fallback={<Loader isLoaded={!!pageContent} />}>
      <div className="max-w-7xl my-0 mx-auto flex flex-col">
        <main className="p-5 pt-10 md:p-14 md:pt-24 lg:p-16 lg:pt-32 lg:flex-shrink lg:flex-grow">
          <FixedNav
            sections={sections}
            className={`hide ${pageContent ? "fadeIn" : ""}`}
          />
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
              className={`hide ${pageContent ? "fadeIn" : ""} col-span-2 row-span-3 pt-3 md:col-start-2 md:col-end-2 overflow-x-hidden`}
            >
              {sections &&
                sections.map((section) => {
                  return (
                    <div
                      key={section.section_id}
                      id={`section_${section.section_id}`}
                      className={`section_${section.section_id} relative mb-20`}
                    >
                      <h2 className="text-2xl pb-2 mb-6 relative uppercase tracking-wider after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-material-blue">
                        {section[titleKey]}
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
                                {posts[sectionKey]?.map((post) => {
                                  return (
                                    <ServiceCard key={post._id} post={post} />
                                  );
                                })}
                              </div>
                            );
                          }
                        })}
                      {section.section_id === "works" &&
                        posts &&
                        Object.keys(posts).map((sectionKey) => {
                          if (sectionKey === section.section_id) {
                            return (
                              <div
                                key={`post_${sectionKey}`}
                                className={`${stylesPosts.post_list} ml-10`}
                              >
                                {posts[sectionKey]?.map((post) => {
                                  return (
                                    <PostCard key={post._id} post={post} />
                                  );
                                })}
                              </div>
                            );
                          }
                        })}
                      {section.section_id === "qualifications" &&
                        posts &&
                        Object.keys(posts).map((sectionKey: string) => {
                          if (sectionKey === section.section_id) {
                            return (
                              <div
                                key={`post_${sectionKey}`}
                                className={`${stylesPosts.post_list} ml-10`}
                              >
                                {posts[sectionKey]?.map((post: PostType) => (
                                  <PostCard
                                    key={post._id}
                                    post={post}
                                    short={true}
                                  />
                                ))}
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
    </Suspense>
  );
}
