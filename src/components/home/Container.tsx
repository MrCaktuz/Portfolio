import React from "react";
import { API_URL } from "@/lib/utils";

const HomeContainer = async () => {
  const fetchedPageContent = await fetch(`${API_URL}/pageContent`, {
    cache: "no-store",
  });

  if (!fetchedPageContent.ok) {
    throw new Error("Failed to fetch PageContent");
  }

  const pageContent = fetchedPageContent.json();

  return <h1>{pageContent.title}</h1>;
};

export default HomeContainer;
