

document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".swiper", {
    loop: true, // Зацикливание слайдов
    autoplay: {
      delay: 5000, // Автопрокрутка каждые 5 секунд
      disableOnInteraction: false, // Автопрокрутка не останавливается при взаимодействии
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    effect: "fade", // Плавное появление нового слайда
    fadeEffect: {
      crossFade: true,
    },
    on: {
      init: function () {
        // Показываем контент на первом активном слайде
        document
          .querySelectorAll(".swiper-slide-active .slide-content")
          .forEach((el) => {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
          });
      },
    },
  });
});
// swiper.on("slideChangeTransitionStart", function () {
//   document.querySelectorAll(".slide-content").forEach((el) => {
//     el.style.opacity = "0";
//     el.style.transform = "translateY(20px)";
//   });
// });
//
// swiper.on("slideChangeTransitionEnd", function () {
//   document
//     .querySelectorAll(".swiper-slide-active .slide-content")
//     .forEach((el) => {
//       el.style.opacity = "1";
//       el.style.transform = "translateY(0)";
//     });
//
//
//
//
//
// });

