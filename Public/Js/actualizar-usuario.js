console.log("enlazado");
const images = document.querySelectorAll(".image");

// Agrega un evento de clic a cada imagen
images.forEach((image) => {
  image.addEventListener("click", function () {
    // Elimina la clase "selected" de todas las imágenes
    images.forEach((img) => {
      img.classList.remove("selected");
    });

    // Agrega la clase "selected" a la imagen clicada
    this.classList.add("selected");
    const selectedImage = document.querySelector(".image.selected");
    const inputImg = document.querySelector(
      'input[name="usuarioConPersona[usuario][imagen_usuario]"]'
    );
    inputImg.value = selectedImage.getAttribute("data-value");
    console.log(inputImg);
  });
});

const button = document.querySelector("#btn-actualizar-usuario");
const allFields = document.querySelectorAll(".input-field__input");
let pass = "";

function updateButtonState() {
  let allFieldsFilled = true;

  allFields.forEach((field) => {
    if (field.id === "usuario__password" || field.id === "usuario__confirmPassword") {
      if (field.value.trim() !== "") {
        const currentStepValid = validarField(field);
        if (!currentStepValid) {
          allFieldsFilled = false;
        }
      }
    } else {
      const currentStepValid = validarField(field);
      if (!currentStepValid) {
        allFieldsFilled = false;
      }
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
      return validarStep(field, /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/);
    case "usuario__password":
      pass = field.value;
      return validarStep(field, /^.{8,}$/);
    case "usuario__confirmPassword":
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
    case "datos-personales__nombre":
      return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s]+$/);
    case "datos-personales__apellido":
      return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s]+$/);
    case "datos-personales__cedula":
      return validarStep(field, /^\d{7}\d$/);
    case "datos-personales__barrio":
      return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s0-9]+$/);
    case "datos-personales__calle":
      return validarStep(field, /^[A-Za-záéíóúÁÉÍÓÚ\s0-9]+$/);
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

document.addEventListener("DOMContentLoaded", function () {
  button.addEventListener("click", function (event) {
    event.preventDefault();
    actualizarUsuario();
  });

  function actualizarUsuario() {
    const form = document.getElementById("form-actualizar-usuario");
    const formData = new FormData(form);
    const currentURL = window.location.href;
    axios
      .post(currentURL, formData)
      .then((response) => {
        console.log("Éxito:", response.data);
        window.alert(response.data.mensaje);
        location.reload();
        window.scrollTo(0, 0);
      })
      .catch((error) => {
        console.error("Error:", error);
        window.alert(response.data.mensaje);
      });
  }
});
