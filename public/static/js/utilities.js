// Modal components
function modal() {
  let modalButtonElements = document.querySelectorAll("[data-toggle=modal]");
  each(modalButtonElements, (btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      const modalId = data(e.target, "target");
      if (modalId) {
        const modalElement = document.querySelector(modalId);

        if (modalElement) {
          let wrapElem = modalElement.querySelector(".modal-wrapper");
          if (wrapElem) {
            wrapElem.style.animationDuration = "500ms";
            addClass(wrapElem, "showInUp");
          }
          addClass(modalElement, "_show");
          createNewEvent("showModal", modalElement, { bubbles: false });
        }
      }
    });
  });

  let closeButtonElements = document.querySelectorAll(
    "[data-dismiss-type=modal]"
  );
  each(closeButtonElements, (btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      let modalElement = parents(e.target, ".modal");

      if (modalElement) {
        let wrapElem = modalElement.querySelector(".modal-wrapper");
        if (wrapElem) {
          removeClass(wrapElem, "showInUp");
        }
        removeClass(modalElement, "_show");
        createNewEvent("hideModal", modalElement, { bubbles: false });
      }
    });
  });

  let submitButtonElements = document.querySelectorAll(
    "[data-enmiss-type=modal]"
  );
  each(submitButtonElements, (btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      let modalElement = parents(e.target, ".modal");

      if (modalElement) {
        createNewEvent("submitModal", modalElement, { bubbles: false });
      }
    });
  });

  document.body.addEventListener("click", (e) => {
    let modalElement = is(e.target, ".modal")
      ? e.target
      : parents(e.target, ".modal");
    let wrapModalElement = parents(e.target, ".modal-wrapper");

    if (modalElement && !wrapModalElement) {
      let wrapElem = modalElement.querySelector(".modal-wrapper");
      if (wrapElem) {
        removeClass(wrapElem, "showInUp");
      }
      removeClass(modalElement, "_show");
      createNewEvent("hideModal", modalElement, { bubbles: false });
    }
  });
}

modal();

// Accordion components
function accordion() {
  let collapseButtonElements = document.querySelectorAll(
    "[data-toggle=accordion]"
  );
  each(collapseButtonElements, (btn) => {
    btn.addEventListener("click", (e) => {
      let collapseId = data(btn, "target");
      let wrapContainerAccordionId = data(btn, "parent");
      if (collapseId) {
        let collapseElement = document.querySelector(collapseId);
        if (collapseElement) {
          wrapContainerAccordionId = data(collapseElement, "parent");
        }
      }
      if (wrapContainerAccordionId) {
        let wrapContainerAccordion = document.querySelector(
          wrapContainerAccordionId
        );
        if (wrapContainerAccordion) {
          let collapseItems =
            wrapContainerAccordion.querySelectorAll(".accordion-item");
          each(collapseItems, (item) => {
            removeClass(item, "_active");
            let itemList = item.querySelector(".accordion-collapse._invisible");
            if (itemList) {
              removeClass(itemList, "_invisible");
            }
          });
        }
      }

      let itemParentElement = parents(btn, ".accordion-item");
      if (itemParentElement) {
        addClass(itemParentElement, "_active");
      }
    });
  });
}
accordion();

// Popover components
function popover() {
  let popovers = document.querySelectorAll("[data-toggle=popover]");
  each(popovers, (p) => {
    p.addEventListener("click", (e) => {
      let menuId = data(p, "target");
      if (menuId) {
        let menuElement = document.querySelector(menuId);

        if (menuElement) {
          let popoverElements = document.querySelectorAll(".popover");
          let isShow = false;
          if (is(menuElement, "._show")) {
            isShow = true;
          }
          each(popoverElements, (el) => {
            removeClass(el, "_show");
          });
          isShow
            ? removeClass(menuElement, "_show")
            : addClass(menuElement, "_show");
        }
      }
    });
  });

  document.body.addEventListener("click", (e) => {
    let p = parents(e.target, ".popover");
    let b = parents(e.target, "[data-toggle=popover]");
    if (!p && !b) {
      let els = document.querySelectorAll(".popover");
      each(els, (el) => {
        removeClass(el, "_show");
      });
    }
  });
}
popover();

// Collapse components
function collapseMenu() {
  let elements = document.querySelectorAll("[data-toggle=collapse]");
  if (elements && elements.length) {
    each(elements, (elem) => {
      elem.addEventListener("click", (e) => {
        e.preventDefault();

        let parentId = data(elem, "parent");
        if (parentId) {
          let parentElement = parents(elem, parentId);
          if (parentElement) {
            toggleClass(parentElement, "_slip");
            let iconElem = elem.querySelector("i");
            if (iconElem) {
              toggleClass(
                iconElem,
                "fa-angle-double-left fa-angle-double-right"
              );
            }
          }
          let additionSelector = data(elem, "addition-selector");
          if (additionSelector) {
            let additionElement = document.querySelectorAll(additionSelector);

            if (additionElement && additionElement.length) {
              each(additionElement, (a) => {
                toggleClass(a, "_slip");
              });
            }
          }
        }
      });
    });
  }

  document.body.addEventListener("click", (e) => {
    let els = document.querySelectorAll(
      "._slip .accordion .accordion-item._active .accordion-collapse"
    );
    let targetElement = e.target;
    if (els && els.length) {
      each(els, (el) => {
        let btnElement = parents(targetElement, ".accordion-item._active");
        if (!btnElement) {
          addClass(el, "_invisible");
        }
      });
    }
  });
}
collapseMenu();

// Upload and Drag image component
function uploadImage() {
  let imageButtonElements = document.querySelectorAll("[data-toggle=media]");

  if (imageButtonElements && imageButtonElements.length) {
    each(imageButtonElements, (media) => {
      let parentSelector = data(media, "parent");

      if (parentSelector) {
        let parentElement = parents(media, parentSelector);

        if (parentElement) {
          let btnSelector = data(media, "alternative"),
            removeSelector = data(media, "remove-selector"),
            dropSelector = data(media, "drop-selector"),
            previewSelector = data(media, "preview-selector");
          let btnElements = parentElement.querySelectorAll(btnSelector),
            removeBtn = parentElement.querySelector(removeSelector),
            imageElement = parentElement.querySelector(previewSelector),
            dropElement = parentElement.querySelector(dropSelector);

          if (btnElements && btnElements) {
            each(btnElements, (btn) => {
              btn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                media.click();
              });
            });
          }

          if (dropElement) {
            each(
              ["dragenter", "dragover", "dragleave", "drop"],
              (eventName) => {
                dropElement.addEventListener(
                  eventName,
                  (e) => {
                    e.preventDefault();
                    e.stopPropagation();

                    let dt = e.dataTransfer;
                    let files = dt ? dt.files : null;

                    if (files && files[0]) {
                      if (removeBtn) {
                        removeClass(removeBtn, "hide");
                      }

                      if (dropElement) {
                        addClass(dropElement, "hide");
                      }
                      if (imageElement) {
                        handleFile(files[0], imageElement);
                      }
                    }
                  },
                  false
                );
              }
            );
          }

          if (removeBtn) {
            removeBtn.addEventListener("click", (e) => {
              if (imageElement) {
                imageElement.src = "";
              }

              addClass(removeBtn, "hide");

              media.value = "";
              if (dropElement) {
                removeClass(dropElement, "hide");
              }
            });
          }

          media.addEventListener("change", (e) => {
            if (e.target.files && e.target.files[0]) {
              if (dropElement) {
                addClass(dropElement, "hide");
              }

              if (removeBtn) {
                removeClass(removeBtn, "hide");
              }

              handleFile(e.target.files[0], imageElement);
            }
          });
        }
      }
    });
  }
}

function handleFile(file, preview) {
  preview.setAttribute("src", URL.createObjectURL(file));
}

uploadImage();

/* Validator Form JS Code */
function Validator(options) {
  let selectorRules = {};
  function validate(inputElement, rule) {
    let formGroupElement = parents(inputElement, options.formGroupSelector);
    let isPageError = options.errorType && options.errorType === "page";
    let errorElement = formGroupElement.querySelector(options.errorSelector);
    if (isPageError) {
      errorElement = document.querySelector(options.errorSelector);
    }
    let errorMessage;
    let rules = selectorRules[rule.selector];

    for (let i = 0; i < rules.length; ++i) {
      switch (inputElement.type) {
        case "radio":
        case "checkbox":
          errorMessage = rules[i](
            formElement.querySelector(rule.selector + ":checked")
          );
          break;
        case "file":
          errorMessage = rules[i](inputElement.files);
          break;
        default:
          errorMessage = rules[i](inputElement.value.trim());
      }
      if (errorMessage) break;
    }
    if (errorElement) {
      if (errorMessage) {
        if (isPageError) {
          errorElement.innerHTML = "";
          let messageElement = createELement("div", { class: "message error" });
          messageElement.innerText = errorMessage;
          errorElement.appendChild(messageElement);
          setTimeout(() => {
            let errorElement = document.querySelector(options.errorSelector);
            errorElement.innerHTML = "";
            errorMessage = null;
          }, 5000);
        } else {
          errorElement.innerText = errorMessage;
          addClass(formGroupElement, "invalid");
        }
      } else {
        if (isPageError) {
          errorElement.innerHTML = "";
          errorMessage = null;
        } else {
          errorElement.innerText = "";
          removeClass(formGroupElement, "invalid");
        }
      }
    }

    return !errorMessage;
  }

  let formElement = document.querySelector(options.form);
  if (formElement) {
    formElement.onsubmit = function (e) {
      e.preventDefault();
      let isFormValid = true;

      options.rules.forEach(function (rule) {
        let inputElements = formElement.querySelectorAll(rule.selector);
        each(inputElements, (inputElement) => {
          let isValid = validate(inputElement, rule);

          if (!isValid) {
            isFormValid = false;
          }
        });
      });
      if (isFormValid) {
        if (typeof options.onSubmit === "function") {
          let formInputs = formElement.querySelectorAll("[name]");
          let formDatas = Array.from(formInputs).reduce(function (
            values,
            input
          ) {
            switch (input.type) {
              case "checkbox":
                if (!input.matches(":checked")) {
                  values[input.name] = "";
                  return values;
                }
                if (!Array.isArray(values[input.name])) {
                  values[input.name] = [];
                }
                values[input.name].push(input.value);
                break;
              case "radio":
                values[input.name] = formElement.querySelector(
                  'input[name="' + input.name + '"]:checked'
                ).value;
                break;
              case "file":
                values[input.name] = input.files;
                break;
              default:
                values[input.name] = input.value;
            }
            return values;
          },
          {});
          options.onSubmit(formDatas);
        } else {
          if (formElement.matches("form")) {
            formElement.submit();
          } else {
            formElement.querySelector("form").submit();
          }
        }
      }
    };
    options.rules.forEach(function (rule) {
      if (Array.isArray(selectorRules[rule.selector])) {
        selectorRules[rule.selector].push(rule.test);
      } else {
        selectorRules[rule.selector] = [rule.test];
      }

      let inputElements = formElement.querySelectorAll(rule.selector);
      each(inputElements, (inputElement) => {
        if (inputElement) {
          let parentElement = parents(inputElement, options.formGroupSelector);

          inputElement.addEventListener("blur", (e) => {
            validate(inputElement, rule);
          });

          inputElement.addEventListener("focus", (e) => {
            let errorElement = parentElement.querySelector(
              options.errorSelector
            );
            if (errorElement) {
              errorElement.innerText = "";
            }
            removeClass(parentElement, "invalid");
          });

          inputElement.addEventListener("input", (e) => {
            let errorElement = parentElement.querySelector(
              options.errorSelector
            );
            if (errorElement) {
              errorElement.innerText = "";
            }
            removeClass(parentElement, "invalid");
          });

          if (inputElement.type === "file") {
            if (inputElement.files.length == 0) {
              let imgPreview = parentElement.querySelector(
                options.viewSelector
              ).children;
              if (imgPreview.length == 0) {
                let errorElement = parentElement.querySelector(
                  options.errorSelector
                );
                errorElement.innerText = "No file chosen !";
                addClass(parentElement, "invalid");
              }
            }

            inputElement.addEventListener("change", (e) => {
              validate(inputElement, rule);
            });
          }
        }
      });
    });
  }
}

Validator.isRequired = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      return value ? undefined : message || "This field cannot be left blank !";
    },
  };
};

Validator.isEmail = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      let regex =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      return regex.test(value) ? undefined : message || "Invalid email !";
    },
  };
};

Validator.minLength = function (selector, min, message) {
  return {
    selector: selector,
    test: function (value) {
      console.log(value.length >= min);
      return value.length >= min
        ? undefined
        : message || `Character length cannot be less than ${min} characters !`;
    },
  };
};

Validator.maxLength = function (selector, max, message) {
  return {
    selector: selector,
    test: function (value) {
      return value.length <= max
        ? undefined
        : message ||
            `Character length cannot be greater than ${max} characters !`;
    },
  };
};

Validator.compareValues = function (selector, getCompareValue, message) {
  return {
    selector: selector,
    test: function (value) {
      if (selector !== "[data-password-type='old']") {
        return value === getCompareValue()
          ? undefined
          : message || "The value you entered does not match !";
      } else {
        return MD5(value) === getCompareValue()
          ? undefined
          : message || "The value you entered does not match !";
      }
    },
  };
};

Validator.fileRequired = function (selector, message) {
  return {
    selector: selector,
    test: function (files) {
      return files.length ? undefined : message;
    },
  };
};

Validator.fileType = function (selector, typeArray, message) {
  return {
    selector: selector,
    test: function (files) {
      for (let i = 0; i < files.length; i++) {
        if (!typeArray.includes(files[i].type)) {
          return message;
        }
      }
    },
  };
};

Validator.fileSize = function (selector, size, message) {
  return {
    selector: selector,
    test: function (files) {
      for (let i = 0; i < files.length; i++) {
        if (files[i].size > size) {
          return message;
        }
      }
    },
  };
};

Validator.isPhone = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      let regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
      return regex.test(value)
        ? undefined
        : message || "Invalid phone number !";
    },
  };
};

function formReset() {
  let formEls = document.forms;
  if (formEls) {
    each(formEls, (formEl) => {
      let resetEl = formEl.querySelector("[type=reset]");
      if (resetEl) {
        resetEl.addEventListener("click", (e) => {
          e.preventDefault();
          let inputEls = formEl.querySelectorAll("input[name]");
          if (inputEls) {
            each(inputEls, (inp) => {
              switch (inp.type) {
                case "number":
                  inp.value = "0";
                  break;
                default:
                  inp.value = "";
              }
            });
          }
        });
      }
    });
  }
}
formReset();
