import { dom } from "vnet-dom";




export const hidePhone = (container) => {
  dom.document.addEventListener('DOMContentLoaded', e => {
    dom.onClick('.js-hidden-phone', e => {
      let btn = e.currentTarget;
      if (btn.classList.contains('active')) return;
      e.preventDefault();
      dom.addClass(btn, 'active');
    }, container);
  });
}