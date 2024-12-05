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