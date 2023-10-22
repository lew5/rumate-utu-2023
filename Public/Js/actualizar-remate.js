const form = document.getElementById("actualizar_remate");

form.querySelectorAll("input, select, textarea").forEach((input) => {
  input.addEventListener("change", function () {
    // Cuando un campo cambie, agrega el campo modificado al FormData
    const formData = new FormData(form);
    formData.set(input.name, input.value);
  });
});

document.getElementById("actualizar").addEventListener("click", function (event) {
  event.preventDefault();
  actualizarRemate();
});

document.getElementById("eliminar-remate").addEventListener("click", function (event) {
  event.preventDefault();
  eliminarRemate();
});

function eliminarRemate() {
  var currentURL = window.location.href;

  // Reemplaza "editar" por "eliminar"
  var url = currentURL.replace("editar", "eliminar");
  axios
    .get(url)
    .then((response) => {
      console.log("Éxito:", response.data);
      window.alert(response.data.mensaje);
      window.location.href = "/rumate/";
    })
    .catch((error) => {
      console.error("Error:", error);
      window.alert(error.response.data.mensaje);
    });
}

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
      window.alert(response.data.mensaje);
    });
}
