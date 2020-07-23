import { dom } from "vnet-dom";




export const bodyScrollbar = () => {
  return;
  let timer;
  dom.window.addEventListener('scroll', e => {
    if (timer) {
      clearTimeout(timer);
      dom.addClass(dom.body, 'show-scrollbar');
    }
    timer = setTimeout(() => {
      dom.removeClass(dom.body, 'show-scrollbar');
    }, 200);
  });
}