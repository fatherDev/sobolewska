import Splide from '@splidejs/splide';

import scroll from '../modules/locomotive';

const handleInfoCardsSlider = () => {
  const splideContainer = document.querySelector('.js-info-splide');

  if (splideContainer === null) return;
  const splide = new Splide(splideContainer, {
    perMove: 1,
    breakpoints: {
      520: {
        perPage: 1,
        autoWidth: false,
      },
    },
    arrows: true,
    updateOnMove: true,
    autoplay: true,
    autoWidth: true,
    interval: 7000,
    gap: 40,
    drag: true,
    pagination: false,
    pauseOnHover: false,
    pauseOnFocus: false,
  });

  splide.mount();
};

export default handleInfoCardsSlider;
