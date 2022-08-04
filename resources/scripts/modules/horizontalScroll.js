import scroll from './locomotive';

class HorizontalScroll {
  constructor(t) {
    if ('string' == typeof t) this.elem = document.querySelector(t);
    else {
      if (!(t instanceof HTMLElement)) return;
      this.elem = t;
    }
    if (
      this.elem &&
      ((this.isWatching = !1),
      (this.isRounded = !1),
      (this.container = this.elem.querySelector(
        '[data-horizontal-scroll-container]'
      )),
      (this.box = this.elem.querySelector('[data-horizontal-scroll-box]')),
      this.box &&
        ((this.content = this.elem.querySelector(
          '[data-horizontal-scroll-content]'
        )),
        this.content))
    ) {
      if (
        ((this.elem.style.height = this.content.offsetWidth + 'px'),
        (this.vw = window.innerWidth),
        (this.parallaxElems = this.elem.querySelectorAll(
          '[data-horizontal-parallax]'
        )),
        (this.hasParallax = 0 !== this.parallaxElems.length && this.vw > 1024),
        this.hasParallax &&
          ((this.parallaxImages = []),
          this.parallaxElems.forEach((t) => {
            let e = {};
            (e.mask = t),
              (e.img = t.querySelector('img')),
              (e.maskRect = t.getBoundingClientRect()),
              (e.imgRect = e.img.getBoundingClientRect()),
              (e.offset = t.dataset.horizontalOffset || 0.15),
              this.parallaxImages.push(e);
          })),
        (this.spyEls = this.elem.querySelectorAll('[data-hs-spy]')),
        this.spyEls.length > 0)
      ) {
        let t = new IntersectionObserver(this.stopSpy, {
          threshold: 0.1,
        });
        this.spyEls.forEach((e) => t.observe(e));
      }
      return (
        this.resize(),
        window.addEventListener(
          'resize',
          debounce(() => {
            this.resize(), scroll.update();
          }, 150)
        ),
        this.elem.addEventListener('enter-view', this.startCycle.bind(this)),
        this.elem.addEventListener('exit-view', this.stopCycle.bind(this)),
        this
      );
    }
  }
  getProgress() {
    let t = -this.elem.getBoundingClientRect().top / this.totalDistance;
    return t < 0 && (t = 0), t > 1 && (t = 1), t;
  }
  update(t) {
    let e = this.getProgress();
    if (t || e !== this.progress)
      (this.isRounded = !1), (this.progress = e), this.moveContent();
    else if (!this.isRounded) {
      let t = Math.round(this.contentX);
      this.content.style.transform = 'translate3d( '.concat(-t, 'px, 0, 0)');
      let e = this.container.y;
      (e = Math.round(e)),
        (this.container.style.transform =
          'matrix3d(1,0,0.00,0,0.00,1,0.00,0,0,0,1,0,0,'.concat(e, ',0,1)')),
        (this.isRounded = !0);
    }
  }
  cycle() {
    this.update(),
      (this.cycleId = requestAnimationFrame(this.cycle.bind(this)));
  }
  startCycle() {
    this.isWatching || (this.cycle(), (this.isWatching = !0));
  }
  stopCycle() {
    (this.isWatching = !1), cancelAnimationFrame(this.cycleId), this.update();
  }
  moveContent() {
    (this.contentX = this.contentTotalDistance * this.progress),
      (this.content.style.transform =
        'matrix3d(1,0,0.00,0,0.00,1,0.00,0,0,0,1,0,'.concat(
          -this.contentX,
          ',0,0,1)'
        )),
      this.hasParallax && requestAnimationFrame(this.parallax.bind(this));
  }
  resize() {
    this.hasParallax &&
      this.parallaxImages.forEach((t) => {
        (t.imgRect = t.img.getBoundingClientRect()),
          (t.imgToMaskSpeedRatio =
            1 - (t.imgRect.width * t.offset) / window.innerWidth),
          (t.imgToViewportWidthDiff = t.imgRect.width - window.innerWidth),
          (t.maskOffset = t.imgToViewportWidthDiff / t.imgToMaskSpeedRatio),
          (t.mask.style.width = window.innerWidth + t.maskOffset + 'px'),
          (t.maskRect = t.mask.getBoundingClientRect()),
          (t.maxTranslate =
            t.maskRect.width / 2 +
            t.imgRect.width * t.offset -
            t.imgRect.width / 2);
      }),
      (this.elem.style.height = this.content.offsetWidth + 'px');
    let t = this.box.getBoundingClientRect(),
      e = this.elem.getBoundingClientRect();
    (this.totalDistance = e.height - t.height),
      (this.contentTotalDistance =
        this.content.getBoundingClientRect().width - t.width),
      (this.vw = window.innerWidth),
      this.update(!0);
  }
  parallax() {
    this.parallaxImages.forEach((t) => {
      let e = t.mask.getBoundingClientRect();
      if (e.left <= this.vw && e.right > 0) {
        let i =
            ((e.width / 2 + e.left - window.innerWidth / 2) /
              (e.width + window.innerWidth)) *
            2,
          s = -i * t.maxTranslate;
        (t.progress = i),
          (t.img.style.transform = 'translate3d('.concat(s, 'px, 0, 0)'));
      }
    });
  }
  stopSpy(t, e) {
    t[0].isIntersecting &&
      (t[0].target.classList.add('is-inview'), e.unobserve(t[0].target));
  }
}

function debounce(t, e) {
  let i;
  return (
    (e = e || 100),
    function (s) {
      i && clearTimeout(i), (i = setTimeout(t, e, s));
    }
  );
}

scroll.on('call', (t, e, i) => {
  switch (t) {
    case 'view':
      let t = new CustomEvent('enter' === e ? 'enter-view' : 'exit-view');
      i.el.dispatchEvent(t);
      break;
  }
});

export default HorizontalScroll;
