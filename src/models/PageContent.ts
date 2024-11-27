import mongoose, { Schema, models } from "mongoose";

const pageContentSchema = new Schema(
  {
    lang: String,
    title: String,
    subtitle: String,
  },
  {
    timestamps: true,
  },
);

const PageContent =
  models.PageContent || mongoose.model("PageContent", pageContentSchema);

export default PageContent;
