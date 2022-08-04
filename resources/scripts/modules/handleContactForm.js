import scroll from './locomotive';

const handleContactForm = () => {
  const formInputs = document.querySelectorAll(
    '.c-form-col input, .c-form-col textarea'
  );
  formInputs.forEach((input) => {
    input.addEventListener('focus', () => inputFocus(input));
    input.addEventListener('blur', () => inputBlur(input));
  });

  const inputFocus = (input) => {
    const label = input.closest('.c-form-col');
    label.classList.add('has-value');
  };

  const inputBlur = (input) => {
    const label = input.closest('.c-form-col');
    if (!input.value) {
      label.classList.remove('has-value');
    }
  };

  const acceptCheckbox = document.getElementById('js-checkbox');
  const submitBtn = document.querySelector('.wpcf7-submit');
  const btnWrapper = document.querySelector('.c-form-btn');

  const checkSubmitBtn = () => {
    if (acceptCheckbox === null) return;
    if (submitBtn.disabled === true) {
      btnWrapper.classList.add('disabled');
    }
    acceptCheckbox.addEventListener('change', () => {
      btnWrapper.classList.toggle('disabled');
    });
  };

  checkSubmitBtn();

  const wpcf7Elm = document.querySelector('.wpcf7');

  wpcf7Elm?.addEventListener(
    'wpcf7mailsent',
    () => {
      const formInputs = document.querySelectorAll(
        '.c-form-col input, .c-form-col textarea'
      );
      formInputs.forEach((input) =>
        input.closest('.c-form-col').classList.remove('has-value')
      );
    },
    false
  );

  function scrollUpdate(event) {
    wpcf7Elm?.addEventListener(
      event,
      () => {
        setTimeout(() => {
          scroll.update();
        }, 300);
      },
      false
    );
  }

  scrollUpdate('wpcf7submit');

  scrollUpdate('wpcf7invalid');
};

export default handleContactForm;
