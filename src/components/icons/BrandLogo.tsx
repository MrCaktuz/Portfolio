import React from "react";

const BrandLogo = ({ className }: { className: string }) => {
  return (
    <div
      id="brandLogo"
      className={`${className} flex-grow-0 flex-shrink-0 rounded-full`}
    >
      <svg className="size-full rounded-full" viewBox="0 0 150 150">
        <circle
          cx="75"
          cy="75"
          r="72.5"
          fill="#263238"
          stroke="#37474F"
          strokeWidth="5"
        />
        <path
          d="M93.9143 58.9085C95.9034 57.0841 98.2252 55.9807 100.735 55.9807C104.688 55.9807 108.164 57.6243 111.793 61.5688L119.91 53.5403C115.146 47.1313 108.33 43.0898 100.735 43.0898C95.5333 43.0898 90.1005 44.7862 86.6308 48.2414L60.9535 73.8787L30.09 43.0898V107.547H43.1229V74.0559L60.8035 91.7215L93.9143 58.9085Z"
          fill="#FAFAFA"
        />
        <path
          d="M99.1261 94.6552C92.0236 94.6552 86.2729 86.2149 86.1216 75.7308L74.872 86.8582C78.6346 98.933 88.0342 107.547 99.1261 107.547C107.626 107.547 115.152 102.494 119.91 94.7107L111.793 86.7041C107.741 91.5389 103.884 94.6552 99.1261 94.6552Z"
          fill="#F58020"
        />
      </svg>
    </div>
  );
};

export default BrandLogo;
