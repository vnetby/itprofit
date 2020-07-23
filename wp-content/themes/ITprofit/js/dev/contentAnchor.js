/**
 * @@ DEPRECATED @@
 * 
 * - Генерирует содержание статьи
 * 
 * - Работает на страницах где выведен контент из редактора 
 * (например статья в блоге)
 * - Собирает элементы с классом "js-art-summary" и создает содержание
 */

import { dom } from "vnet-dom";
import { React } from "vnet-dom/DOM/domReact";



export const contentAnchor = container => {
  let summary = dom.findFirst('.js-art-summary', container);
  let labels = dom.findAll('.content-anchor', container);
  if (!summary || !labels) return;

  let links = createSummaryLinks(labels);

  appendSummaryLinks(links, summary);
  dom.addClass(summary.parentNode, 'active');
}




const createSummaryLinks = labels => {
  let links = [];
  labels.forEach((label, i) => {
    let id = `anchor_${i}`;
    links.push({ id, label: label.textContent });
    label.id = id;
  });
  return links;
}




const appendSummaryLinks = (links, container) => {
  let wrap = dom.document.createDocumentFragment();
  links.forEach(item => {
    wrap.appendChild((
      <div class="sum-item">
        <a href={`#${item.id}`} className="sum-link dashed-underline c-blue">{item.label}</a>
      </div>
    ));
  });
  container.innerHTML = '';
  container.appendChild(wrap);
}