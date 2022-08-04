import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';

import scroll from '../modules/locomotive';

const handleTestimonialsSlider = () => {
  const splideContainer = document.querySelector('.js-testimonial-splide');

  if (splideContainer === null) return;
  const splide = new Splide(splideContainer, {
    perMove: 1,
    type: 'fade',
    updateOnMove: true,
    rewind: true,
    arrows: false,
    autoplay: true,
    interval: 7000,
    drag: true,
    pagination: false,
    pauseOnHover: false,
    pauseOnFocus: false,
  });

  //handle progress circle
  const circles = [...document.querySelectorAll('.js-circle')];

  circles.forEach((item) => {
    const arrayOffset = item.getTotalLength();

    splide.on('autoplay:playing', (progress) => {
      item.style.strokeDashoffset = arrayOffset * (1 - progress) + 'px';
    });
  });

  // handle pagination
  const paginationBtns = [...document.querySelectorAll('.js-pagination-btn')];

  const activeClass = 'c-testimonials-pagination__item--active';

  //Remove active classes
  const removeClasses = () => {
    paginationBtns.forEach((btn) => {
      btn.classList.remove(activeClass);
    });
  };
  removeClasses();
  paginationBtns[0].classList.add(activeClass);

  //handle On clink pagination btn
  paginationBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      splide.go(parseInt(btn.dataset.paginationid));
    });
  });

  //handle On move slider to add active class for btn
  splide.on('move', (data) => {
    removeClasses();

    paginationBtns.forEach((btn) => {
      if (parseInt(btn.dataset.paginationid) === data) {
        btn.classList.add(activeClass);
      }
    });
  });

  splide.on('moved', () => {
    scroll.update();
  });
  splide.mount();
};

export default handleTestimonialsSlider;
