import LocomotiveScroll from 'locomotive-scroll';
import 'locomotive-scroll/src/locomotive-scroll.scss';

const scrollContainer = document.querySelector('[data-scroll-container]');

const scroll = new LocomotiveScroll({
  el: scrollContainer,
  smooth: true,
  getDirection: true,
  //repeat: true,
});

export default scroll;
