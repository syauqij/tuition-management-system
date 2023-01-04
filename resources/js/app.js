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

Alpine.start();

import 'tw-elements';
