import { PostType } from "@/lib/types";
import React from "react";
import stylesWorks from "@/styles/works.module.css";
import { FaExternalLinkAlt } from "react-icons/fa";

const WorkCard = ({ post }: { post: PostType }) => {
  const renderContent = () => (
    <div
      className={`${stylesWorks.works_item_content} observedElements right bg-material-dark shadow-lg block mb-5 p-4`}
    >
      <div className="flex justify-between items-center">
        <h3 className="font-sertext-lg font-bold">{post.title}</h3>
        <FaExternalLinkAlt className="flex-shrink-0 opacity-0 text-material-orange" />
      </div>
      <div
        className="mt-4"
        dangerouslySetInnerHTML={{
          __html: post.description,
        }}
      ></div>
      <div className="flex flex-wrap justify-start items-center mt-4">
        {post.tags.split(";").map((tag) => {
          return (
            <p key={`key_${tag}`} className={`${stylesWorks.work_tag}`}>
              {tag}
            </p>
          );
        })}
      </div>
    </div>
  );

  if (post.main_link) {
    return (
      <a
        href={post.main_link}
        target="_blanc"
        className={`${stylesWorks.works_item} ${stylesWorks.works_item_link}`}
      >
        {renderContent()}
      </a>
    );
  }

  return <div className={stylesWorks.works_item}>{renderContent()}</div>;
};

export default WorkCard;
