import { PostType } from "@/lib/types";
import React from "react";
import stylesPosts from "@/styles/posts.module.css";
import { LuExternalLink } from "react-icons/lu";

const PostCard = ({ post, short }: { post: PostType; short: boolean }) => {
  const renderContent = () => (
    <div
      className={`${stylesPosts.post_item_content} observedElements right bg-material-dark shadow-lg block mb-8 p-4 pt-6`}
    >
      <h3 className="text-xl">{post.title}</h3>
      {post.main_link && (
        <LuExternalLink className=" hidden md:block absolute top-4 right-4 opacity-0 text-material-orange" />
      )}
      <div className="absolute top-0 left-0 px-3 flex translate-y-[-50%]">
        {post.to && (
          <p className="rounded-full text-sm text-material-light px-2 bg-material-dark mr-4">
            {post.to}
          </p>
        )}
        {post.from && (
          <p className="rounded-full text-sm text-material-light px-2 bg-material-dark">
            {post.from}
          </p>
        )}
      </div>
      <div
        className={`${short ? "" : "mt-4"} text-material-light`}
        dangerouslySetInnerHTML={{
          __html: post.description,
        }}
      ></div>
      {post.tags && (
        <div className="flex flex-wrap justify-start items-center mt-6 -mb-2">
          {post.tags.split(";").map((tag) => {
            return (
              <p key={`key_${tag}`} className={`${stylesPosts.post_tag} mb-2`}>
                {tag}
              </p>
            );
          })}
        </div>
      )}
    </div>
  );

  if (post.main_link) {
    return (
      <a
        href={post.main_link}
        target="_blanc"
        className={`${stylesPosts.post_item} ${stylesPosts.post_item_link}`}
      >
        {renderContent()}
      </a>
    );
  }

  return <div className={stylesPosts.post_item}>{renderContent()}</div>;
};

export default PostCard;
