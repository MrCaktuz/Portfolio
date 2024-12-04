export interface PageContentType {
  _id: string;
  title: string;
  subtitle: string;
}

export interface PostType {
  _id: string;
  lang: string;
  title: string;
  from: string;
  to: string;
  order: number;
  description: string;
  tags: string;
  main_link: string;
  section_id: string;
}

export interface GroupedPostsType {
  [key: string]: PostType[] | undefined;
}

export interface SectionType {
  _id: string;
  order: number;
  section_id: string;
  title_fr: string;
  title_en: string;
  nav_fr: string;
  nav_en: string;
}
