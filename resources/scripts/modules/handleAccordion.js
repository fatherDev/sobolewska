import scroll from './locomotive';

const handleAccordion = () => {
  const accordionItems = [
    ...document.querySelectorAll('.js-nav-list li.menu-item-has-children'),
  ];

  if (accordionItems.length === 0) return;
  accordionItems.forEach((item) => {
    const accordionBody = document.querySelector('.js-accordion__body');
    accordionBody.style.maxHeight = 0 + 'px';
    item.addEventListener('click', () => toggleAccordionAlt(item));
  });

  function toggleAccordionAlt(el) {
    const accordionBody = el.querySelector('.js-accordion__body');
    const accordionInner = el.querySelector('.sub-menu');

    el.classList.toggle('is-active');
    if (el.classList.contains('is-active')) {
      accordionBody.style.maxHeight = accordionInner.offsetHeight + 'px';
    } else {
      accordionBody.style.maxHeight = 0 + 'px';
    }
  }
};

export default handleAccordion;
