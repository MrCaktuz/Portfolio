import { cookies } from "next/headers";
import { ENV } from "@/lib/utils";

export const getLocale = async () => {
  const cookieStore = await cookies();

  const localeCookie = cookieStore.get("locale")?.value;
  if (!localeCookie || !ENV.AVAILABLE_LANGS.includes(localeCookie)) {
    return ENV.DEFAULT_LANG;
  }
  return localeCookie;
};
