const next = document.querySelector(".next");
const prev = document.querySelector(".prev");

// var zIndex = 1;
var zIndex = document.querySelector(".img1").style.zIndex;

next.addEventListener("click", function () {
  if (zIndex === "1") {
    document.querySelector(".img1").style.zIndex = "3";
    document.querySelector(".img2").style.zIndex = "2";
    document.querySelector(".img3").style.zIndex = "1";
    zIndex = "2";
  } else if (zIndex === "2") {
    document.querySelector(".img1").style.zIndex = "2";
    document.querySelector(".img2").style.zIndex = "3";
    document.querySelector(".img3").style.zIndex = "1";
    zIndex = "3";
  } else if (zIndex === "3") {
    document.querySelector(".img1").style.zIndex = "1";
    document.querySelector(".img2").style.zIndex = "2";
    document.querySelector(".img3").style.zIndex = "3";
    zIndex = "1";
  }
});
prev.addEventListener("click", function () {
  if (zIndex === "1") {
    document.querySelector(".img1").style.zIndex = "1";
    document.querySelector(".img2").style.zIndex = "2";
    document.querySelector(".img3").style.zIndex = "3";
    zIndex = "3";
  } else if (zIndex === "2") {
    document.querySelector(".img1").style.zIndex = "3";
    document.querySelector(".img2").style.zIndex = "2";
    document.querySelector(".img3").style.zIndex = "1";
    zIndex = "1";
  } else if (zIndex === "3") {
    document.querySelector(".img1").style.zIndex = "2";
    document.querySelector(".img2").style.zIndex = "3";
    document.querySelector(".img3").style.zIndex = "1";
    zIndex = "2";
  }
});
