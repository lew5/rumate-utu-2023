function removeInputFieldError() {
  const inputElements = document.querySelectorAll(".input-field .input-field__input");
  const inputErrorMessage = document.querySelectorAll(".input-field .input-field__error-message");

  function removeErrorClass() {
    inputElements.forEach((element) => {
      element.classList.remove("input-field__input--error");
    });
  }

  inputElements.forEach((element) => {
    element.addEventListener("focus", function () {
      removeErrorClass();

      inputErrorMessage.forEach((element) => {
        element.classList.add("hidden");
      });
    });
  });
}
removeInputFieldError();
