import Splide from '@splidejs/splide';

const handleHomeHeroSlider = () => {
  const splideContainer = document.querySelector('.js-home-hero-splide');

  if (splideContainer === null) return;

  const splide = new Splide(splideContainer, {
    type: 'fade',
    perMove: 1,
    arrows: false,
    rewind: true,
    updateOnMove: true,
    autoplay: true,
    speed: 0,
    interval: 10000,
    drag: true,
    pagination: true,
    pauseOnHover: false,
    pauseOnFocus: false,

    classes: {
      pagination: 'c-home-hero__pagination splide__pagination',
      page: 'c-home-hero__pagination-page splide__pagination__page',
    },
  });

  splide.on('autoplay:playing', (progress) => {
    const percentageValue = progress * 100;

    if (percentageValue < 1) return;
    splideContainer.style.setProperty('--x', `${percentageValue}%`);
  });

  splide.on('move', (newIndex, prevIndex) => {
    const { slide: prevSlide } = splide.Components.Slides.getAt(prevIndex);
    const { slide: currentSlide } = splide.Components.Slides.getAt(newIndex);
    const progressBar = prevSlide.querySelector('.js-home-hero-progress-bar');

    progressBar.style = splideContainer.style.cssText;

    setTimeout(() => {
      progressBar.style = '';
    }, 800);
    const prevVideo = prevSlide.querySelector('video');
    const currentVideo = currentSlide.querySelector('video');

    if (prevVideo === null && currentVideo === null) return;
    let prevVideoTimeoutID = null;
    let currentVideoTimeoutID = null;

    if (prevVideo !== null) {
      clearTimeout(prevVideoTimeoutID);
      prevVideoTimeoutID = setTimeout(() => {
        prevVideo.pause();
        prevVideo.currentTime = 0;
      }, 900);
    }

    if (currentVideo !== null) {
      clearTimeout(currentVideoTimeoutID);
      currentVideoTimeoutID = setTimeout(() => {
        currentVideo.play();
      }, 550);
    }
  });

  splide.on('mounted', () => {
    const { slide: firstSlide } = splide.Components.Slides.getAt(0);
    const video = firstSlide.querySelector('video');

    if (video === null) return;

    video.autoplay = true;
  });

  splide.mount();
};

export default handleHomeHeroSlider;
