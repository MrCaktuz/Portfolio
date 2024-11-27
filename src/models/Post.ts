import mongoose, { Schema, models } from "mongoose";

const postSchema = new Schema(
  {
    lang: String,
    title: String,
    from: String,
    to: String,
    order: Number,
    description: String,
    tags: String,
    main_link: String,
    section_id: String,
  },
  {
    timestamps: true,
  },
);

const Post = models.Post || mongoose.model("Post", postSchema);

export default Post;
