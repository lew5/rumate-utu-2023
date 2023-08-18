// Cuando el contenido del documento HTML se ha cargado completamente
document.addEventListener("DOMContentLoaded", function () {
  // Variable para almacenar el paso actual
  let currentStep = 1;

  // Seleccionar el botón "SIGUIENTE"
  const button = document.querySelector(".button__input");

  const backButton = document.querySelector(".actions span .link");
  console.log(backButton);

  // Seleccionar todos los pasos de registro
  const steps = document.querySelectorAll(".register-step");

  // Matriz para almacenar los campos de entrada de cada paso
  const allFields = [];

  // Iterar a través de cada paso y encontrar los campos de entrada
  steps.forEach(function (step) {
    const fields = step.querySelectorAll(".input-field__input");
    allFields.push(fields);
  });

  // Función para actualizar el estado del botón
  function updateButtonState() {
    // Variable para rastrear si todos los campos están llenos en el paso actual
    let allFieldsFilled = true;

    // Iterar a través de los campos de entrada en el paso actual
    allFields[currentStep - 1].forEach(function (field) {
      if (field.value.trim() === "") {
        allFieldsFilled = false;
      }
    });

    // Si todos los campos están llenos
    if (allFieldsFilled && currentStep) {
      button.removeAttribute("disabled"); // Habilitar el botón
    } else {
      button.setAttribute("disabled", "disabled"); // Deshabilitar el botón
    }

    // Cambiar el texto del botón según el paso actual
    if (currentStep === steps.length) {
      button.value = "REGISTRARSE";
    } else {
      button.value = "SIGUIENTE";
    }
  }

  // Llamar a la función para actualizar el estado del botón al cargar la página
  updateButtonState();

  // Agregar un evento click al botón
  button.addEventListener("click", function () {
    // Ocultar el paso actual
    steps[currentStep - 1].style.display = "none";

    // Avanzar al siguiente paso
    currentStep++;
    backButton.classList.remove("hidden");

    // Asegurarse de que el valor de currentStep no exceda el número de pasos
    if (currentStep > steps.length) {
      currentStep = steps.length;
    }

    // Mostrar el siguiente paso
    steps[currentStep - 1].style.display = "block";

    // Actualizar el estado del botón
    updateButtonState();
  });

  // Agregar controladores de eventos a los campos de entrada
  allFields.forEach(function (fields) {
    fields.forEach(function (field) {
      // Cuando se ingresa texto en un campo, llamar a la función para actualizar el estado del botón
      field.addEventListener("input", updateButtonState);
    });
  });

  backButton.addEventListener("click", function () {
    // Ocultar el paso actual
    steps[currentStep - 1].style.display = "none";

    // Retroceder al paso anterior
    currentStep--;

    // Asegurarse de que el valor de currentStep no sea menor que 1
    if (currentStep < 1) {
      currentStep = 1;
    }

    // Mostrar el paso anterior
    steps[currentStep - 1].style.display = "block";

    // Actualizar el estado del botón
    updateButtonState();

    // Ocultar el enlace "VOLVER" si estamos en el primer paso
    if (currentStep === 1) {
      backButton.classList.add("hidden");
    }
  });
});
