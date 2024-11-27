import { NextResponse } from "next/server";
import connectDB from "@/lib/mongoose";
import Section from "@/models/Section";

export async function GET() {
  await connectDB();
  const Sections = await Section.find();

  return NextResponse.json(Sections);
}

export async function POST(request: NextRequest) {
  try {
    await connectDB();

    const { order, section_id, title_fr, title_en, nav_fr, nav_en } =
      await request.json();
    await Section.create({
      order,
      section_id,
      title_fr,
      title_en,
      nav_fr,
      nav_en,
    });

    return NextResponse.json(
      {
        message: "Section created",
      },
      {
        status: 201,
      },
    );
  } catch (error) {
    console.error(`Error during POST Section request : ${error}`);
    return NextResponse.json(
      {
        message: "Serveur was unable to create the section.",
        error: error,
      },
      {
        status: 500,
      },
    );
  }
}
