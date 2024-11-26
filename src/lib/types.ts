export interface PageContentType {
  _id: string;
  owner: string;
  title: string;
  job_title: string;
  catch_phrase: string;
  description: string;
}

export interface PostType {
  _id: string;
  owner: string;
  lang: string;
  title: string;
  from: string;
  to: string;
  order: number;
  description: string;
  tags: string;
  main_link: string;
  section_title: string;
}
