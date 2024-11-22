import mongoose, { Schema, models } from "mongoose";

const pageContentSchema = new Schema(
  {
    owner: String,
    lang: String,
    title: String,
    job_title: String,
    catch_phrase: String,
    description: String,
  },
  {
    timestamps: true,
  },
);

const PageContent =
  models.PageContent || mongoose.model("PageContent", pageContentSchema);

export default PageContent;
