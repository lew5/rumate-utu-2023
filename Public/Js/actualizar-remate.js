// Obtiene una referencia al formulario
const form = document.getElementById("actualizar_remate");

// Agrega eventos onchange a los campos que deseas rastrear
form.querySelectorAll("input, select, textarea").forEach((input) => {
  input.addEventListener("change", function () {
    // Cuando un campo cambie, agrega el campo modificado al FormData
    const formData = new FormData(form);
    formData.set(input.name, input.value);
  });
});

// Maneja el envío del formulario
document.getElementById("actualizar").addEventListener("click", function (event) {
  event.preventDefault();
  actualizarRemate();
});

function actualizarRemate() {
  const form = document.getElementById("actualizar_remate");
  const formData = new FormData(form);
  const currentURL = window.location.href;
  axios
    .post(currentURL, formData)
    .then((response) => {
      console.log("Éxito:", response.data);
      window.alert(response.data.mensaje);
    })
    .catch((error) => {
      console.error("Error:", error);
      window.alert(response.error.mensaje);
    });
}
