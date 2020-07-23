import { dom } from "vnet-dom";
import { validateInput } from "vnet-dom/DOM/domFormValidate";







export const validateOnBlur = container => {
  let forms = dom.findAll('.validate-form', container);
  if (!forms || !forms.length) return;
  forms.forEach(form => {
    let inputs = dom.findAll('.input', form);
    if (!inputs || !inputs.length) return;
    inputs.forEach(input => {
      input.addEventListener('blur', e => {
        if (validateInput(input)) {
          addSuccesInputClass(input);
        }
      });
    })
  });
}





export const addInputError = (input, msg) => {
  let help = getCreateHelp(input);
  help.innerHTML = msg;
  dom.removeClass(input, 'is-valid');
  dom.addClass(input, 'has-error');
  input.dataset.errorMsg = msg;
  dom.dispatch(input, 'validate-add-error');
}



export const removeInputError = input => {
  removeCompareError(input);
  removeInputErrorHandler(input);
  removeHelp(input);
}




const removeCompareError = input => {
  let compare = input.dataset.compare;
  if (!compare) return;
  compare = dom.findFirst(compare);
  if (!compare) return;
  removeInputErrorHandler(compare);
}




const removeInputErrorHandler = input => {
  dom.removeClass(input, 'has-error');
  dom.addClass(input, 'is-valid');
  let help = dom.findFirst('.input-help', input.parentNode);
  if (help) help.innerHTML = '';
  input.removeAttribute('data-error-msg');
  dom.dispatch(input, 'validate-rm-error');
}



const addSuccesInputClass = input => {
  dom.removeClass(input, 'has-error');
  dom.addClass(input, 'is-valid');
}



export const getCreateHelp = input => {
  let help = dom.findFirst('.wpcf7-not-valid-tip', input.parentNode);
  if (help) help.parentNode.removeChild(help);
  help = dom.create('span', { className: 'wpcf7-not-valid-tip', role: 'alert' });
  input.parentNode.appendChild(help);
  return help;
}





export const removeHelp = input => {
  let help = dom.findFirst('.wpcf7-not-valid-tip', input.parentNode);
  if (help) help.parentNode.removeChild(help);
}

