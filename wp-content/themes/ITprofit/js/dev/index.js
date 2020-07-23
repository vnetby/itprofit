import "../../css/dev/index.scss";

// VNET-DOM FUNCTIONS
import { dom } from "vnet-dom";
import { domTabs } from "vnet-dom/DOM/domTabs";


// PROJECT FUNCTIONS
import { scrollHeader } from "./scrollHeader";
import { editorContentParagraph } from "./editorContentParagraph";
import { bodyScrollbar } from "./bodyScrollbar";
import { setCompensateScrollbar } from "./setCompensateScrollbar";
import { initDynamicForms, initStaticFunctions } from "./forms";
import { hidePhone } from "./hidePhone";
import { accordion } from "./accordion";
import { indexAboutTabs } from "./indexAboutTabs";
import { googleTargets } from "./googleTargets";



export const dynamicFunctions = wrap => {
  let container = dom.getContainer(wrap);
  if (!container) return;
  editorContentParagraph(container);
  initDynamicForms(container);
  hidePhone(container);
  domTabs(container);
  accordion(container);
}



const staticFunctions = () => {
  googleTargets();
  scrollHeader();
  bodyScrollbar();
  setCompensateScrollbar();
  initStaticFunctions();
  indexAboutTabs();
}




staticFunctions();
dynamicFunctions();