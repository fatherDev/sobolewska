const hamburger = () => {
  const toggleMenu = document.querySelector('.js-toggle-menu');
  const menu = document.querySelector('.js-nav-list');

  if (toggleMenu === null) return;
  toggleMenu.addEventListener('click', function () {
    menu.classList.toggle('is-active');
    this.classList.toggle('is-active');
    document.body.classList.toggle('js-scroll-block');
  });
};

export default hamburger;
