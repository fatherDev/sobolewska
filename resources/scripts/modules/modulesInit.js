/**
 * Sliders
 */

import handleTestimonialsSlider from '../sliders/testimonialSlider';
import handleRelatedNewsSlider from '../sliders/relatedNewsSlider';
import handleInfoCardsSlider from '../sliders/infoSlider';
import handleHomeHeroSlider from '../sliders/homeHeroSlider';

/**
 * Modules
 */
import handleFooter from './handleFooter';
import hidingHeader from './header';
import hrefChecker from './hrefChecker';
import hamburger from './hamburger';
import handleMorePosts from './handleMorePosts';
import handleVideoModal from './videoModal';
import handleContactForm from './handleContactForm';
import handlePartners from './handlePartners';
import handleAccordion from './handleAccordion';
import responsiveVideo from './responsiveVideo';

const modulesInit = () => {
  // Sliders
  handleHomeHeroSlider();
  handleTestimonialsSlider();
  handleRelatedNewsSlider();
  handleInfoCardsSlider();

  // Modules
  responsiveVideo();
  handleFooter();
  hidingHeader();
  hrefChecker();
  hamburger();
  handleMorePosts();
  handleVideoModal();
  handleContactForm();
  handlePartners();
  handleAccordion();
};

export default modulesInit;
