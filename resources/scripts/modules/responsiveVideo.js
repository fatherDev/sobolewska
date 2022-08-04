import { ifItemExists } from '../utils/ifItemExists';
import { breakpoints } from '../utils/breakpoints';
import { debounce } from '../utils/debounce';

const responsiveVideo = () => {
  const videos = document.querySelectorAll('.c-home-hero video');

  if (videos.length === 0) return;

  const checkWindowWidth = () => {
    return window.innerWidth < breakpoints.mobile ? 'sm' : 'xl';
  };

  const initVideosSrc = (isInit = false) => {
    videos?.forEach((video) => {
      const deviceSize = checkWindowWidth();
      const videoSrc = {
        sm: video.dataset.mobileVid,
        xl: video.dataset.desktopVid,
      };

      video.setAttribute('src', videoSrc[deviceSize] || videoSrc['xl']);

      if (isInit === true) return;

      video.play();
    });
  };

  ifItemExists(videos, () => {
    initVideosSrc(true);
    window.addEventListener('resize', debounce(initVideosSrc, 300));
  });
};

export default responsiveVideo;
