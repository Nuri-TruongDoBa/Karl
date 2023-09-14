// Function get data from attribute data- of element
function data(element, dataName) {
  let result = "",
    nameNew = "data-" + dataName;
  if (element) {
    let dataValue = element.getAttribute(nameNew);

    if (dataValue && dataValue.length) {
      result = dataValue.trim();
    }
  }
  return result;
}

// Functions add or remove multiple class into element
function addClass(element, stringClass) {
  if (element) {
    let classes = stringClass.trim().split(" ");
    Array.from(classes).forEach((c) => {
      element.classList.add(c);
    });
  }
}

function removeClass(element, stringClass) {
  if (element) {
    let classes = stringClass.trim().split(" ");

    Array.from(classes).forEach((c) => {
      element.classList.remove(c);
    });
  }
}

function toggleClass(element, stringClass) {
  if (element) {
    let classes = stringClass.trim().split(" ");
    Array.from(classes).forEach((c) => {
      element.classList.toggle(c);
    });
  }
}

// Function loop array alternative forEach
function each(elements, callback) {
  if (elements && elements.length) {
    Array.from(elements).forEach((el) => callback(el));
  }
}

// Function check element is target object
function is(element, selector) {
  if (element.matches(selector)) {
    return true;
  }

  return false;
}

// Function get parent of element by selector
function parents(element, selector) {
  while (element.parentElement) {
    if (is(element.parentElement, selector)) {
      return element.parentElement;
    }
    element = element.parentElement;
  }
}

// Function dispatch new event
function createNewEvent(eventName, element, options = { bubbles: true }) {
  let event = new Event(eventName, options);
  element.dispatchEvent(event);
}

// Function get style css
function getStyle(element, property) {
  return parseFloat(
    getComputedStyle(element).getPropertyValue(property).split("px").shift()
  );
}

// Function set variable root element
function setRootVariableCss(variables) {
  let r = document.querySelector(":root");
  if (r) {
    Object.entries(variables).forEach((v) => {
      r.style.setProperty(v[0], v[1]);
    });
  }
}

// Call ajax function
function fetchData(url, method, data, headers = {}) {
  return new Promise((res, rej) => {
    let stringified = "";
    for (const [key, value] of Object.entries(data)) {
      stringified += `${stringified != "" ? "&" : ""}${key}=${value}`;
    }

    if (method.trim().toLowerCase() === "get") {
      url += "?" + stringified;
    }

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
      if (xhr.readyState == 4)
        if (xhr.status == 200) res(xhr.responseText);
        else rej({ code: xhr.status, text: xhr.responseText });
    };
    xhr.open(method, url, true);
    if (method.trim().toLowerCase() !== "get") {
      if (headers) {
        Object.entries(headers).forEach((h) => {
          xhr.setRequestHeader(h[0], h[1]);
        });
      } else {
        xhr.setRequestHeader("Content-Type", "application/json");
      }

      xhr.send(JSON.stringify(data));
    } else {
      xhr.send();
    }
  });
}

// Set slug for page field
function slug(input) {
  let parentSelector = data(input, "parent");
  let parentElement = parentSelector ? parents(input, parentSelector) : null;
  if (parentElement) {
    const slugSelector = data(input, "slug");
    const slugElement = slugSelector
      ? parentElement.querySelector(slugSelector)
      : null;

    if (slugElement) {
      const slugValue = (input.value ?? "")
        .toLowerCase()
        .replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, "a")
        .replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, "e")
        .replace(/(ì|í|ị|ỉ|ĩ)/g, "i")
        .replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, "o")
        .replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, "u")
        .replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, "i")
        .replace(/(đ)/g, "d")
        .replace(
          /(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/g,
          "-"
        )
        .replace(/( )/g, "-")
        .replace(/[^\w-]+/g, "");

      slugElement.value = slugValue;
    }
  }
}

// Create element func
function createELement(tag, attributes) {
  let el = document.createElement(tag);
  if (attributes) {
    Object.entries(attributes).forEach((attribute) => {
      el.setAttribute(attribute[0], attribute[1]);
    });
  }

  return el;
}

// Function handle file upload
function prepareFile(file, callback) {
  let reader = new FileReader();
  reader.addEventListener("load", (e) => {
    callback(null, e.target.result);
  });

  reader.addEventListener("error", (e) => {
    callback(e);
  });

  reader.readAsDataURL(file);
}

function resizeImage(base64Str) {
  let img = new Image();
  img.src = base64Str;
  let canvas = document.createElement("canvas");
  let MAX_WIDTH = 400;
  let MAX_HEIGHT = 350;
  let width = img.width;
  let height = img.height;

  if (width > height) {
    if (width > MAX_WIDTH) {
      height *= MAX_WIDTH / width;
      width = MAX_WIDTH;
    }
  } else {
    if (height > MAX_HEIGHT) {
      width *= MAX_HEIGHT / height;
      height = MAX_HEIGHT;
    }
  }
  canvas.width = width;
  canvas.height = height;
  let ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0, width, height);
  return canvas.toDataURL();
}
