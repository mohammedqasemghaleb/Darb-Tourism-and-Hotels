$(document).ready(function () {
  var mySwiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    loop: true,
    effect: 'coverflow',
    autoplay: true,
    grabCursor: true,
    centeredSlides: true,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      640: {
        slidesPerView: 1,
      },
      320: {
        slidesPerView: 1,
      }
    }
  });
  /* Start WOW Animation */
  var wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: false, // default
  })
  wow.init();
});
/* End WOW Animation */

/* Start Images Slider Button Click */
// let i = 0; // current slide
// let j = 5; // total slides
// const dots = document.querySelectorAll(".dot-container button");
// const images = document.querySelectorAll(".image-container img");
// function next() {
//   document.getElementById("content" + (i + 1)).classList.remove("active");
//   i = (j + i + 1) % j;
//   document.getElementById("content" + (i + 1)).classList.add("active");
//   indicator(i + 1);
// }
// function prev() {
//   document.getElementById("content" + (i + 1)).classList.remove("active");
//   i = (j + i - 1) % j;
//   document.getElementById("content" + (i + 1)).classList.add("active");
//   indicator(i + 1);
// }
// function indicator(num) {
//   dots.forEach(function (dot) {
//     dot.style.backgroundColor = "transparent";
//   });
//   document.querySelector(".dot-container button:nth-child(" + num + ")").style.backgroundColor = "#ad0101";
// }
// function dot(index) {
//   images.forEach(function (image) {
//     image.classList.remove("active");
//   });
//   document.getElementById("content" + index).classList.add("active");
//   i = index - 1;
//   indicator(index);
// }
/* End Images Slider Button Click */

/* *********************************************************************** */
/* Start Images Slider Automatic */
let landingPage = document.querySelector(".landingPage");
let imageArray = ["Blood-donation2.svg", "healthy-man-donating-his-blood.png", "Profile-details.svg", "Blood-donation.svg", "hospital-reception.png"];
setInterval(() => {
  let randomNumber = Math.floor(Math.random() * imageArray.length);
  landingPage.style.backgroundImage = 'url("imgs/' + imageArray[randomNumber] + '")';
}, 1000);
/* End Images Slider Automatic */
/* *********************************************************************** */


