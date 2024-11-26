import React from "react";
import PostCard from "./PostCard";
import PostType from "@/lib/types";

const PostSection = ({
  section,
  posts,
}: {
  section: string;
  posts: PostType[];
}) => {
  return (
    <div key={section} id={`section_${section}`} className="py-8">
      <h2 className="font-bold font-serif text-2xl">{section}</h2>
      {posts.map((post) => (
        <PostCard key={post._id} post={post} />
      ))}
    </div>
  );
};

export default PostSection;
