import { dom } from "vnet-dom";




export const successSubmit = () => {
  dom.on('wpcf7mailsent', dom.body, e => {
    let msg = e.detail.apiResponse.message;
    rmMsg();
    showMsg(msg);
    dom.css(dom.body, { overflow: 'hidden' });
  });
}






const showMsg = (msg) => {
  let wrap = dom.create('div', 'success-mail-send');
  let div = dom.create('div', 'text');
  div.innerHTML = msg;
  wrap.appendChild(div);
  dom.body.appendChild(wrap);
}



const rmMsg = () => {
  let item = dom.findFirst('success-mail-send');
  if (item) item.parentNode.removeChild(item);
}