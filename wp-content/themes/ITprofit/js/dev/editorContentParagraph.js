/**
 * - Находит все пустые параграфы и добаляет класс "empty-p"
 * - Работате на страницах на которых есть ".editor-content"
 */

import { dom } from "vnet-dom";





export const editorContentParagraph = container => {
  let items = dom.findAll('.editor-content');
  if (!items) return;
  items.forEach(item => init(item));
}



const init = item => {
  let els = dom.findAll('p', item);
  if (!els) return;
  els.forEach(p => {
    let content = p.innerHTML.replace(/[\s]+/g, '');
    content = content.replace(/&nbsp;/g, '');
    if (!content) {
      dom.addClass(p, 'empty-p');
    }
  });
}