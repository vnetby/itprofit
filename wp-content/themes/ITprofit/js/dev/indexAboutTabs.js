import { dom } from "vnet-dom";




export const indexAboutTabs = () => {
  let section = dom.findFirst('.section__about');
  if (!section) return;
  init(section);
}




const init = section => {
  let state = dom.window.innerWidth >= 992 ? 'desktop' : 'mobile';
  dom.onWindowResize(e => {
    let currentState = dom.window.innerWidth >= 992 ? 'desktop' : 'mobile';
    if (state === currentState) return;
    resetLinks(section);
    resetTabs(section);
    resetCollapse(section);
    state = currentState;
  });
}




const resetLinks = section => {
  let links = dom.findAll('.link__about', section);
  if (!links) return;
  links.forEach((link, i) => {
    if (i === 0) {
      dom.addClass(link, 'active');
    } else {
      dom.removeClass(link, 'active');
    }
  });
}




const resetTabs = section => {
  let tabs = dom.findAll('.tab', section);
  if (!tabs) return;
  tabs.forEach((tab, i) => {
    if (i === 0) {
      dom.addClass(tab, 'active');
    } else {
      dom.removeClass(tab, 'active');
    }
  });
}





const resetCollapse = section => {
  let items = dom.findAll('.collapse-body', section);
  if (!items) return;

  items.forEach((item, i) => {
    item.removeAttribute('style');
    if (i === 0) {
      dom.addClass(item, 'active');
    } else {
      dom.removeClass(item, 'active');
    }
  });
}