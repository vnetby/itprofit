import { dom } from "vnet-dom";



export const scrollHeader = () => {
  let header = dom.findFirst('.header');
  if (!header) return;
  dom.onWindowScroll(e => {
    setHeaderClass(header);
  });
}



const setHeaderClass = header => {
  if (!header) return;
  let scroll = dom.window.pageYOffset;
  if (scroll > 10 && !header.classList.contains('in-scroll')) {
    dom.addClass(header, 'in-scroll');
    return;
  }
  if (scroll <= 10 && header.classList.contains('in-scroll')) {
    dom.removeClass(header, 'in-scroll');
  }
}