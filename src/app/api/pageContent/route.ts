import { NextResponse } from "next/server";
import PageContent from "@/models/PageContent";
import connectDB from "@/lib/mongoose";
import { getLocale } from "../route";
import { ENV } from "@/lib/utils";

export async function GET() {
  const locale = await getLocale();
  await connectDB();
  let PageContentData = await PageContent.find({
    owner: ENV.OWNER,
    lang: locale,
  });

  if (!PageContentData.length && locale !== ENV.DEFAULT_LANG) {
    PageContentData = await PageContent.find({
      owner: ENV.OWNER,
      lang: ENV.DEFAULT_LANG,
    });
  }
  return NextResponse.json(...PageContentData);
}

export async function POST(request: NextRequest) {
  try {
    await connectDB();

    const { lang, title, job_title, catch_phrase, description } =
      await request.json();
    await PageContent.create({
      owner: ENV.OWNER,
      lang,
      title,
      job_title,
      catch_phrase,
      description,
    });

    return NextResponse.json(
      {
        message: "PageContent created",
      },
      {
        status: 201,
      },
    );
  } catch (error) {
    console.error(`Error during POST Recip request : ${error}`);
    return NextResponse.json(
      {
        message: "Serveur was unable to create the pageContent.",
        error: error,
      },
      {
        status: 500,
      },
    );
  }
}
