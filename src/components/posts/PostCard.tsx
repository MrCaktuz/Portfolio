import { PostType } from "@/lib/types";
import React from "react";

const PostCard = ({ post }: { post: PostType }) => {
  return (
    <div key={post._id} className="hover:bg-material">
      <h3>{post.title}</h3>
      <div dangerouslySetInnerHTML={{ __html: post.description }}></div>
    </div>
  );
};

export default PostCard;
