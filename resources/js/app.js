import './bootstrap';

import Choices from 'choices.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.choices = (element) => {
  return new Choices(element, {
    removeItemButton: true,
    allowHTML: true,
    placeholder: true,
    placeholderValue: null,
  });
}

window.studentChoices = (element) => {
  const choices = new Choices(element, {
    removeItemButton: true,
    allowHTML: true,
    placeholder: true,
    placeholderValue: null,
  });

  element.addEventListener(
    'highlightItem',
    function(event) {
      var url = '/enrolments/' + event.detail.value;
      window.open(url, "_blank");
    },
    false,
  );
}

Alpine.start();

import 'tw-elements';
