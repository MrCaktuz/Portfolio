export const ENV = {
  MONGODB_URI: process.env.MONGODB_URI,
  BASE_URL: process.env.NEXT_PUBLIC_BASE_URL,
  DEFAULT_LANG: process.env.NEXT_PUBLIC_DEFAULT_LANG,
  AVAILABLE_LANGS: process.env.NEXT_PUBLIC_AVAILABLE_LANGS?.split("|"),
};

export const API_URL = `${ENV.BASE_URL}/api`;

export const initBgChangeOnMousemove = () => {
  window.addEventListener("mousemove", (oEvent) => {
    document.documentElement.style.setProperty(
      "--pointerX",
      `${oEvent.clientX}px`,
    );
    document.documentElement.style.setProperty(
      "--pointerY",
      `${oEvent.clientY}px`,
    );
  });
};

export const scrollObserver = (elms) => {
  const intObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("onScreen");
      } else {
        entry.target.classList.remove("onScreen");
      }
    });
  });

  elms.forEach((elm) => intObserver.observe(elm));
};
