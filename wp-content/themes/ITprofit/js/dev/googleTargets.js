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
    yaCounter65474599.reachGoal('formsubmit');
    // ga('send', 'event', 'form', 'submit');
    ga('send', {
      hitType: 'event',
      eventCategory: 'form',
      eventAction: 'submit'
    });

    console.log(`Yandex: formsubmit\r\nGoogle категория: form\r\nGoogle action: submit`);
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
    // ga('send', 'event', type, 'me');
    ga('send', {
      hitType: 'event',
      eventCategory: type,
      eventAction: 'me'
    });

    console.log(`Yandex: ${type}me\r\nGoogle категория: ${type}\r\nGoogle action: me`);
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
      // ga('send', 'event', 'phone', 'click');
      ga('send', {
        hitType: 'event',
        eventCategory: 'phone',
        eventAction: 'click'
      });

      console.log(`Yandex: phoneclick\r\nGoogle категория: phone\r\nGoogle action: click`);
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
    // ga('send', 'event', 'mail', 'me');
    ga('send', {
      hitType: 'event',
      eventCategory: 'mail',
      eventAction: 'me'
    });
    console.log(`Yandex: mailme\r\nGoogle категория: mail\r\nGoogle action: me`);
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
    if (text.indexOf('info@b-ts.ru') !== -1) {
      yaCounter65474599.reachGoal('mailcopy');
      // ga('send', 'event', 'mail', 'copy');
      ga('send', {
        hitType: 'event',
        eventCategory: 'mail',
        eventAction: 'copy'
      });
      console.log(`Yandex: mailcopy\r\nGoogle категория: mail\r\nGoogle action: copy`);
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