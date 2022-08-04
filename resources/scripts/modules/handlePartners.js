import scroll from './locomotive';

const handlePartners = () => {
  const partnersList = document.querySelector('.js-partners-list');
  const partnersItems = [...document.querySelectorAll('.js-partners-item')];

  if (partnersItems.length > 5) {
    partnersList.style.height =
      (partnersItems[0].offsetHeight + 18) * 5 - 18 + 'px';

    partnersList.addEventListener('mouseenter', () => {
      scroll.stop();
    });

    partnersList.addEventListener('mouseleave', () => {
      scroll.start();
    });

    window.addEventListener('resize', () => {
      partnersList.style.height =
        (partnersItems[0].offsetHeight + 18) * 5 + 'px';
    });
  }
};

export default handlePartners;
