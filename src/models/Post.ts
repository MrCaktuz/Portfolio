import mongoose, { Schema, models } from "mongoose";

const postSchema = new Schema(
  {
    owner: String,
    lang: String,
    title: String,
    from: String,
    to: String,
    order: Number,
    description: String,
    tags: String,
    main_link: String,
    section_title: String,
    section_key: String,
  },
  {
    timestamps: true,
  },
);

const Post = models.Post || mongoose.model("Post", postSchema);

export default Post;
