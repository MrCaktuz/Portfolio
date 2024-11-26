import React from "react";
import iconStyles from "@/styles/icons.module.css";

const Loader = () => {
  return (
    <div
      className={`${iconStyles.loader} size-40 fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] bg-material-dark p-8 rounded-full before:rounded-full before:bg-material-dark before:absolute before:top-0 before:bottom-0 before:right-0 before:left-0 before:z-[-1] after:rounded-full after:absolute after:top-[-5px] after:bottom-[-5px] after:right-[-5px] after:left-[-5px] after:z-[-2]`}
    >
      <svg className="size-full" viewBox="-399 -287 1000 720">
        <path
          fill="#EDF0F2"
          d="M311.159-109.791c22.101-20.323,47.899-32.614,75.788-32.614c43.922,0,82.545,18.309,122.864,62.247
		L600-169.589C547.066-240.98,471.338-286,386.947-286c-57.799,0-118.163,18.897-156.716,57.385L-55.072,56.965L-398-286v718h144.81
		V58.939l196.451,196.782L311.159-109.791z"
        />
        <path
          fill="#F58020"
          d="M369.068,288.4c-78.917,0-142.814-94.018-144.495-210.803L99.578,201.547
		C141.384,336.052,245.825,432,369.068,432c94.441,0,178.063-56.283,230.932-142.982l-90.189-89.187
		C464.791,253.687,421.932,288.4,369.068,288.4z"
        />
      </svg>
    </div>
  );
};

export default Loader;
