import { dom } from "vnet-dom";



export const googleTargets = () => {
  dom.document.addEventListener('DOMContentLoaded', e => {
    initPhoneClick();
    initEmailClick();
    initSocialClick();
    initForms();
    initCopyText();
  });
}




/**
 * - Отправка формы
 * 
 * - Передает событие: formsubmit
 * 
 */

const initForms = () => {
  dom.on('wpcf7mailsent', '.wpcf7', e => {
    yaCounter65474599.reachGoal('optformsuccess');

    dataLayer.push({ event: 'optformsuccess' });
    console.log(`Yandex: optformsuccess\r\nGoogle: optformsuccess`);
  });
}






/**
 * 
 * - Нажатие на социальные сети
 * 
 * - Передает событие: viberme|whatsappme|telegramme
 * 
 */

const initSocialClick = () => {
  dom.onClick('.gt-social', e => {
    let btn = e.currentTarget;
    let type = btn.dataset.gtType || 'social';
    yaCounter65474599.reachGoal(type + 'me');

    dataLayer.push({ event: `${type}me` });
    console.log(`Yandex: ${type}me\r\nGoogle: ${type}me`);
  });
}






/**
 * 
 * - Нажате на телефон
 * 
 * - Передает событие: phoneclick
 * 
 */

const initPhoneClick = () => {
  dom.onClick('.gt-phone', e => {
    let btn = e.currentTarget;
    if (btn.classList.contains('js-hidden-phone') && !btn.classList.contains('active')) {
      yaCounter65474599.reachGoal('phoneclick');

      dataLayer.push({ event: `phoneclick` });
      console.log(`Yandex: phoneclick\r\nGoogle: phoneclick`);
    }
  });
}






/**
 * 
 * - Нажатие на email
 * 
 * - Передает событие: mailme
 * 
 */

const initEmailClick = () => {
  dom.onClick('.gt-email', e => {
    yaCounter65474599.reachGoal('mailme');
    dataLayer.push({ event: `mailme` });
    console.log(`Yandex: mailme\r\nGoogle: mailme`);
  });
}







/**
 * - Копирование email
 * 
 * - Передает событие: mailcopy
 * 
 */

const initCopyText = () => {
  dom.on('copy', dom.body, e => {
    if (!e.target.classList.contains('gt-email')) return;
    let text = getSelectedText();
    if (e.target.classList.contains('gt-email')) {
      yaCounter65474599.reachGoal('mailcopy');
      dataLayer.push({ event: `mailcopy` });
      console.log(`Yandex: mailcopy\r\nGoogle: mailcopy`);
    }
  });
}









const getSelectedText = () => {
  let text = '';
  if (typeof dom.window.getSelection != 'undefined') {
    text = dom.window.getSelection().toString();
  } else if (typeof dom.document.selection != 'undefined' && dom.document.selection.type == 'Text') {
    text = dom.document.selection.createRange().text;
  }
  return text;
}