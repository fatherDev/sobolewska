const handleFooter = () => {
  const footer = document.querySelector('.js-footer');
  const tesimonialSection = document.querySelector('.js-testimonials-repeater');

  if (tesimonialSection === null) return;
  footer.classList.add('l-footer--dark');
};

export default handleFooter;
