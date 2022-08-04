import barba from '@barba/core';
import scroll from './locomotive';
import gsap from 'gsap';
import modulesInit from './modulesInit';

function barbaInit() {
  const loader = document.querySelector('.page-cover');

  // reset position of the loading screen
  gsap.set(loader, {
    y: '-100%',
  });

  function loaderIn() {
    // GSAP tween to stretch the loading screen across the whole screen
    return gsap.fromTo(
      loader,
      {
        y: '-100%',
      },
      {
        duration: 1,
        y: 0,
        ease: 'Power4.easeOut',
      }
    );
  }

  function loaderAway() {
    // GSAP tween to hide the loading screen
    return gsap.to(loader, {
      duration: 1,
      y: '100%',
      ease: 'Power4.easeOut',
    });
  }

  // do something before the transition starts
  barba.hooks.before(() => {
    document.querySelector('html').classList.add('is-transitioning');
    barba.wrapper.classList.add('is-animating');
  });

  barba.hooks.leave(() => {
    const barbaContainer = document.getElementById('barba-container');
    barbaContainer.classList.remove('is-not-transformed');
    barbaContainer.classList.add('is-transformed-down');
  });

  // do something after the transition finishes
  barba.hooks.after(() => {
    const barbaContainer = document.getElementById('barba-container');
    document.querySelector('html').classList.remove('is-transitioning');
    barba.wrapper.classList.remove('is-animating');
    barbaContainer.classList.add('is-not-transformed');
    const bodyClasses = document.getElementById('body-classes');
    document.body.setAttribute('class', bodyClasses.className);
    scroll.destroy();
    scroll.init();
    document.querySelectorAll('.wpcf7 > form').forEach(function (e) {
      wpcf7.init(e);
    });
    modulesInit();
  });

  barba.init({
    transitions: [
      {
        async leave() {
          await loaderIn();
        },
        enter() {
          loaderAway();
        },
        async afterEnter() {},
      },
    ],
  });
}

window.addEventListener('load', function () {
  barbaInit();
});
