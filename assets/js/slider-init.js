const sliderJs = () => {

  new window.Swiper(".value-swiper", {
    modules: [Navigation, Pagination],
    slidesPerView: 1.2,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: ".swiper-next-custom",
      prevEl: ".swiper-prev-custom"
    },
    autoplay: {
      delay: 3e3,
      // 3 seconds
      disableOnInteraction: false
      // Continue after interaction
    },
    breakpoints: {
      640: {
        slidesPerView: 2.2
      },
      1024: {
        slidesPerView: 2.9
      }
    }
  });
  new window.Swiper(".functionalities-slider", {
    slidesPerView: "auto",
    spaceBetween: 24,
    centeredSlides: true,
    loop: true,
    speed: 5e3,
    allowTouchMove: false,
    autoplay: {
      delay: 0,
      disableOnInteraction: true
    },
    freeMode: true
    // Crucial for ticker effect
    // breakpoints: {
    //   640: { slidesPerView: 2.2 },
    //   1024: { slidesPerView: 5.5 },
    // },
  });
};
export {
  sliderJs as s
};
