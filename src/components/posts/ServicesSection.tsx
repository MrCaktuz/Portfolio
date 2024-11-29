import { PostType } from "@/lib/types";
import React from "react";
import ServiceCard from "@/components/posts/ServiceCard";

const ServicesSection = ({
  sectionTitle,
  posts,
}: {
  sectionTitle: string;
  posts: PostType[];
}) => {
  return (
    <div className="section_services relative mb-20">
      <h2 className="text-xl pb-4 mb-4 relative uppercase tracking-wider after:absolute after:left-0 after:bottom-0 after:w-full after:h-[1px] after:bg-material-blue">
        {sectionTitle}
      </h2>
      <div className="grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
        {posts.map((post) => {
          return <ServiceCard key={post._id} post={post} />;
        })}
      </div>
    </div>
  );
};

export default ServicesSection;
