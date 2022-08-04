import Splide from '@splidejs/splide';

import scroll from '../modules/locomotive';

const handleRelatedNewsSlider = () => {
  const splideContainer = document.querySelector('.js-related-news-splide');

  if (splideContainer === null) return;
  const splide = new Splide(splideContainer, {
    perMove: 1,
    updateOnMove: true,
    arrows: true,
    autoplay: true,
    autoWidth: true,
    interval: 7000,
    gap: 40,
    drag: true,
    pagination: false,
    pauseOnHover: false,
    pauseOnFocus: false,
  });

  splide.on('moved', () => {
    scroll.update();
  });

  splide.mount();
};

export default handleRelatedNewsSlider;
