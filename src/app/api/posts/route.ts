import { NextResponse } from "next/server";
import connectDB from "@/lib/mongoose";
import Post from "@/models/Post";
import { getLocale } from "../route";
import { ENV } from "@/lib/utils";

export async function GET() {
  const locale = await getLocale();
  await connectDB();
  let Posts = await Post.find({
    owner: ENV.OWNER,
    lang: locale,
  });

  if (!Posts.length && locale !== ENV.DEFAULT_LANG) {
    Posts = await Post.find({
      owner: ENV.OWNER,
      lang: ENV.DEFAULT_LANG,
    });
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
      section_title,
    } = await request.json();
    await Post.create({
      owner: ENV.OWNER,
      lang,
      title,
      from,
      to,
      order,
      description,
      tags,
      main_link,
      section_title,
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
