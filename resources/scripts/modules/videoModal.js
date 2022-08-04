import scroll from './locomotive';

const handleVideoModal = () => {
  const videoTrigger = document.querySelector('.js-video-trigger');
  const videoTriggerFile = document.querySelector('.js-video-trigger--file');
  const videoWrapper = document.querySelector('.js-video-wrapper');
  const videoClose = document.querySelector('.js-video-close');
  const header = document.querySelector('.l-header');
  const html = document.querySelector('html');
  const video = document.querySelector('.js-video');
  const classes = {
    activeClass: 'is-active',
    blockClass: 'js-scroll-block',
    hideClass: 'hide',
  };

  if (videoTrigger?.dataset.src === '') return;
  videoTrigger?.addEventListener('click', () => {
    if (!html.classList.contains('has-scroll-scrolling')) {
      videoWrapper?.classList.add(classes.activeClass);
      html.classList.add(classes.blockClass);
      header?.classList.add(classes.hideClass);
      scroll.stop();
      if (videoTriggerFile) {
        setTimeout(() => {
          video.play();
        }, 300);
      }
      video.src = videoTrigger.dataset.src;
    }
  });

  videoClose?.addEventListener('click', () => {
    videoWrapper?.classList.remove(classes.activeClass);
    html.classList.remove(classes.blockClass);
    if (videoTriggerFile) {
      video.pause();
      video.currentTime = 0;
    }
    scroll.start();
    scroll.update();
    video.src = '';
  });
};

export default handleVideoModal;
