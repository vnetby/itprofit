import { dom } from "vnet-dom";
import { domFormValidate } from "vnet-dom/DOM/domFormValidate";

import { typePhone } from "./typePhone";
import { typeFile } from "./typeFile";
import { addInputError, removeInputError } from "./validate";
import { recaptcha } from "./recaptcha";
import { successSubmit } from "./successSubmit";



export const initDynamicForms = container => {
  typePhone(container);
  typeFile(container);
  initValidate(container);
}




export const initStaticFunctions = () => {
  successSubmit();
}






const initValidate = (container) => {
  let validateArgs = {
    container,
    messages: back_dates.validateMsg,
    addInputError,
    removeInputError,
    DEBUG: false
  }
  if (back_dates.recaptchaSrc) {
    validateArgs.afterValidate = appendCaptchaToken;
  }
  domFormValidate(validateArgs);
}









const appendCaptchaToken = (form, isValid) => {
  return new Promise((resolve, reject) => {
    recaptcha(form).then(() => resolve(isValid));
  });
}
