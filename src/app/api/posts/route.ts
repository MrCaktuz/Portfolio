import { NextResponse } from "next/server";
import connectDB from "@/lib/mongoose";
import Post from "@/models/Post";
import { getLocale } from "../route";
import { ENV } from "@/lib/utils";

export async function GET() {
  const locale = await getLocale();
  await connectDB();
  let Posts = await Post.find({
    lang: locale,
  }).sort({ order: 1 });

  if (!Posts.length && locale !== ENV.DEFAULT_LANG) {
    Posts = await Post.find({
      lang: ENV.DEFAULT_LANG,
    }).sort({ order: 1 });
  }

  return NextResponse.json(Posts);
}

export async function POST(request: NextRequest) {
  try {
    await connectDB();

    const {
      lang,
      title,
      from,
      to,
      order,
      description,
      tags,
      main_link,
      section_id,
    } = await request.json();
    await Post.create({
      lang,
      title,
      from,
      to,
      order,
      description,
      tags,
      main_link,
      section_id,
    });

    return NextResponse.json(
      {
        message: "Post created",
      },
      {
        status: 201,
      },
    );
  } catch (error) {
    console.error(`Error during POST Post request : ${error}`);
    return NextResponse.json(
      {
        message: "Serveur was unable to create the post.",
        error: error,
      },
      {
        status: 500,
      },
    );
  }
}
