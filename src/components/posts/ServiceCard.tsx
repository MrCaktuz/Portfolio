import { PostType } from "@/lib/types";
import React from "react";

const ServiceCard = ({ post }: { post: PostType }) => {
  return (
    <div
      key={post._id}
      className="observedElements right p-5 md:p-8 border border-material shadow-lg bg-material-dark"
    >
      <h3 className="text-xl mb-5">{post.title}</h3>
      <div
        className="text-material-light"
        dangerouslySetInnerHTML={{
          __html: post.description,
        }}
      ></div>
    </div>
  );
};

export default ServiceCard;
