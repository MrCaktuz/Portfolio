import mongoose, { Schema, models } from "mongoose";

const sectionSchema = new Schema(
  {
    order: Number,
    section_id: String,
    title_fr: String,
    title_en: String,
    nav_fr: String,
    nav_en: String,
  },
  {
    timestamps: true,
  },
);

const Section = models.Section || mongoose.model("Section", sectionSchema);

export default Section;
