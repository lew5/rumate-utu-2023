console.log("enlazado");
document.addEventListener("DOMContentLoaded", function () {
  let currentStep = 1;
  const button = document.querySelector(".button__input");
  const backButton = document.querySelector(".actions span .link");
  const steps = document.querySelectorAll(".register-step");
  const allFields = [];

  steps.forEach((step) => {
    const fields = step.querySelectorAll(".input-field__input");
    allFields.push(fields);
  });

  function updateButtonState() {
    //! prueba
    // if (currentStep !== 3) {
    //   currentStep = 3;
    //   steps.forEach((step, index) => {
    //     step.style.display = index === 2 ? "block" : "none";
    //   });
    // }

    let allFieldsFilled = true;

    allFields[currentStep - 1].forEach((field) => {
      switch (currentStep) {
        case 1:
          currentStepValid = validarStep_1(field);
          break;
        case 2:
          currentStepValid = validarStep_2(field);
          break;
        case 3:
          currentStepValid = validarStep_3(field);
          break;
        default:
          break;
      }

      if (field.value.trim() === "" || !currentStepValid) {
        allFieldsFilled = false;
      }
    });

    button.disabled = !allFieldsFilled;
    button.value = currentStep === steps.length ? "REGISTRARSE" : "SIGUIENTE";
    button.type = allFieldsFilled && currentStep === steps.length ? "submit" : "button";
  }

  updateButtonState();

  button.addEventListener("click", function () {
    steps[currentStep - 1].style.display = "none";
    currentStep++;
    backButton.classList.remove("hidden");

    if (currentStep > steps.length) {
      currentStep = steps.length;
    }

    steps[currentStep - 1].style.display = "block";
    updateButtonState();
  });

  allFields.forEach((fields) => {
    fields.forEach((field) => {
      field.addEventListener("input", updateButtonState);
    });
  });

  backButton.addEventListener("click", function () {
    steps[currentStep - 1].style.display = "none";
    currentStep--;

    if (currentStep < 1) {
      currentStep = 1;
    }

    steps[currentStep - 1].style.display = "block";
    updateButtonState();

    if (currentStep === 1) {
      backButton.classList.add("hidden");
    }
  });

  let pass = "";

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

  function validarStep_1(field) {
    switch (field.id) {
      case "register-step-1-nombre":
        return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s]+$/);
      case "register-step-1-apellido":
        return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s]+$/);
      case "register-step-1-cedula":
        return validarStep(field, /^\d{7}\d$/);
      default:
        return true;
    }
  }

  function validarStep_2(field) {
    switch (field.id) {
      case "register-step-2-barrio":
        return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s0-9]+$/);
      case "register-step-2-calle":
        return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s0-9]+$/);
      case "register-step-2-numero":
        return validarStep(field, /^\d{1,6}$/);
      case "register-step-2-telefono":
        return validarStep(field, /^\d{8,9}$/);
      default:
        return true;
    }
  }

  function validarStep_3(field) {
    switch (field.id) {
      case "register-step-3-username":
        return validarStep(field, /^(?=.{4,8}$)[a-zA-Z]+[0-9]*$/);
      case "register-step-3-email":
        return validarStep(field, /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/);
      case "register-step-3-password":
        pass = field.value;
        return validarStep(field, /^.{8,}$/);
      case "register-step-3-confirmPassword":
        const isValid =
          field.value === pass && field.value.length > 0 && field.value.length === pass.length;
        var regex = /^.{8,}$/;

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
      default:
        return true;
    }
  }
});
