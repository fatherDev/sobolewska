/**
 * External Dependencies
 */

import './modules/locomotive';
import './modules/barba';

import scroll from './modules/locomotive';
import HorizontalScroll from './modules/horizontalScroll';
import modulesInit from './modules/modulesInit';

document.addEventListener('DOMContentLoaded', () => {
  const horizontalScrollElems = [
    ...document.querySelectorAll('[data-horizontal-scroll]'),
  ];

  horizontalScrollElems.forEach((item) => {
    const elem = new HorizontalScroll(item);
    elem.update();
  });

  modulesInit();

  scroll.update();
});
