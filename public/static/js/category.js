let submitElement = document.querySelector("#btnSubmit");
if (submitElement) {
  submitElement.addEventListener("click", (e) => {
    e.preventDefault();

    let formElement = document.querySelector("#formCategory");
    if (formElement) {
      let dataForm = new FormData(formElement);
      let fileInput = formElement.querySelector("[name=thumb]");
      if (fileInput && fileInput.files && fileInput.files[0]) {
      }
      dataForm = Object.fromEntries(dataForm.entries());
      let headers = {
        "Content-Type":
          "multipart/form-data; charset=utf-8; boundary=" +
          Math.random().toString().substring(2),
      };
      fetchData(
        formElement.getAttribute("action"),
        "post",
        dataForm,
        headers
      ).then((res) => {
        console.log(res);
      });
    }
  });
}

let categoryNameElement = document.querySelector("form [name=name]");
if (categoryNameElement) {
  categoryNameElement.addEventListener("input", (e) => {
    slug(e.target);
  });
}

// Validation form
Validator({
  form: "#formCategory",
  formGroupSelector: ".form-group",
  errorSelector: ".page-messages",
  errorType: "page",
  rules: [
    Validator.isRequired("#categoryName", "Please enter category's name !"),
    Validator.maxLength(
      "#categoryName",
      50,
      "Please enter at least 50 characters !"
    ),
  ],
});
