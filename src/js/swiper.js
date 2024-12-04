const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: false,
    delay: 5000,
    speed: 1000,
    cssMode: true,

    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});

const swiper_abu = new Swiper('.swiper-aboutus', {
  loop: true,
  autoplay: true,
  speed: 1000,
  cssMode: true,

  pagination: {
      el: '.swiper-pagination-2',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

const swiper_activite = new Swiper('.swiper-activite', {
  cssMode: true,
  scrollbar: {
    el: ".swiper-scrollbar",
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

const swiper_adv = new Swiper('.swiper-avantages', {
  loop: true,
  loopAddBlankSlides: false,
  cssMode:true,

  spaceBetween: 30,
  slidesPerView: 4,
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 1,
      spaceBetween: 30
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 4,
      spaceBetween: 30
    }
  },

  navigation: {
    nextEl: '.swiper-button-next-2',
    prevEl: '.swiper-button-prev-2',
  },
});