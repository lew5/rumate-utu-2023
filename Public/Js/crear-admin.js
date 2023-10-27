console.log("enlazado");

document.addEventListener("DOMContentLoaded", function () {
  const button = document.querySelector("#btn-actualizar-usuario");
  const allFields = document.querySelectorAll(".input-field__input");
  let pass = "";
  function updateButtonState() {
    let allFieldsFilled = true;

    allFields.forEach((field) => {
      const currentStepValid = validarField(field);

      if (field.value.trim() === "" || !currentStepValid) {
        allFieldsFilled = false;
      }
    });

    button.disabled = !allFieldsFilled;
  }

  updateButtonState();

  allFields.forEach((field) => {
    field.addEventListener("input", updateButtonState);
  });

  function validarField(field) {
    switch (field.id) {
      case "usuario__username":
        return validarStep(field, /^(?=.{4,8}$)[a-zA-Z]+[0-9]*$/);
      case "usuario__email":
        return validarStep(field, /^[a-zA-Z0-9._%+-]+@[a-zAZ0-9.-]+\.[a-zA-Z]{2,}$/);
      case "usuario__password":
        pass = field.value;
        return validarStep(field, /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!])(?!.*\s).{8,}$/);
      case "usuario__confirmPassword":
        const isValid =
          field.value === pass && field.value.length > 0 && field.value.length === pass.length;
        var regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!])(?!.*\s).{8,}$/;

        if (validarStep(field, regex) && isValid) {
          field.classList.remove("input-field__input--error");
          field.classList.add("input-field__input--ok");
        } else {
          if (field.value.length > 0) {
            field.classList.remove("input-field__input--ok");
            field.classList.add("input-field__input--error");
          }
        }
        return isValid;
      case "datos-personales__nombre":
        return validarStep(field, /^[A-Za-z]+$/);
      case "datos-personales__apellido":
        return validarStep(field, /^[A-Za-z\s]+$/);
      case "datos-personales__cedula":
        return validarStep(field, /^\d{7}\d$/);
      case "datos-personales__barrio":
        return validarStep(field, /^[A-Za-z\s0-9]+$/);
      case "datos-personales__calle":
        return validarStep(field, /^[A-Za-z\s0-9]+$/);
      case "datos-personales__numero":
        return validarStep(field, /^\d{1,6}$/);
      case "datos-personales__telefono":
        return validarStep(field, /^\d{8,9}$/);
      default:
        return true;
    }
  }

  function validarStep(field, regex) {
    const value = field.value;
    const isValid = regex.test(value);

    if (value.length > 0) {
      field.classList.toggle("input-field__input--error", !isValid);
      field.classList.toggle("input-field__input--ok", isValid);
    } else {
      field.classList.remove("input-field__input--error", "input-field__input--ok");
    }

    return isValid;
  }
});
