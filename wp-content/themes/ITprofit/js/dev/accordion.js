import { dom } from "vnet-dom";


let settings;


export const accordion = (container, sets = {}) => {
  settings = sets;

  let items = dom.findAll('.js-accordion', container);
  if (!items) return;

  items.forEach(item => init(item));
}





const init = wrap => {
  if (canInit(wrap)) {

  }
  dom.onClick('.js-accordion-link', e => {
    e.preventDefault();
    if (!canInit(wrap)) return;
    if (e.currentTarget.classList.contains('active')) return;
    collapseAll(wrap);
    toggleActiveLinks(wrap);
    addActiveLink(e.currentTarget);
    removeCollapse(e.currentTarget);
  }, wrap);
}





const canInit = wrap => {
  let breakMin = wrap.dataset.breakpointMin;
  if (breakMin) {
    breakMin = parseInt(breakMin);
    if (dom.window.innerWidth < breakMin) return false;
  }

  let breakMax = wrap.dataset.breakpointMax;
  if (breakMax) {
    breakMax = parseInt(breakMax);
    if (dom.window.innerWidth >= breakMax) return false;
  }

  return true;
}






const collapseAll = wrap => {
  let items = dom.findAll('.collapse-body', wrap);
  if (!items) return;
  $(items).slideUp({ duration: 200 });
}





const toggleActiveLinks = wrap => {
  dom.removeClass('.js-accordion-link', 'active', wrap);
}





const addActiveLink = btn => {
  dom.addClass(btn, 'active');
}





const removeCollapse = btn => {
  let target = btn.dataset.target || btn.getAttribute('href');
  if (!target) return;
  target = dom.findFirst(target);
  if (!target) return;
  $(target).slideDown({ duration: 200 });
  settings.after && settings.after(btn, target);
}