import { dom } from "vnet-dom";



export const setCompensateScrollbar = () => {
  let style = dom.create('style');

  style.innerHTML = `
    body.compensate-for-scrollbar {
      margin-right: ${dom.scrollBarWidth}px;
    }
  `;
  dom.document.head.appendChild(style);
}