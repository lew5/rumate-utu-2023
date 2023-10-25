const form = document.getElementById("actualizar_lote");

form.querySelectorAll("input, select, textarea").forEach((input) => {
  input.addEventListener("change", function () {
    // Cuando un campo cambie, agrega el campo modificado al FormData
    const formData = new FormData(form);
    formData.set(input.name, input.value);
  });
});

document.getElementById("actualizar").addEventListener("click", function (event) {
  event.preventDefault();
  actualizarLote();
});

// document.getElementById("eliminar-lote").addEventListener("click", function (event) {
//   event.preventDefault();
//   if (window.confirm("¿Seguro que quieres eliminar este lote?")) {
//     eliminarRemate();
//   }
// });

function eliminarRemate() {
  var currentURL = window.location.href;
  var url = currentURL.replace("editar", "eliminar");
  axios
    .get(url)
    .then((response) => {
      window.alert(response.data.mensaje);
    })
    .catch((error) => {
      console.error("Error:", error);
      window.alert(error.response.data.mensaje);
    });
}

function actualizarLote() {
  var camposLote = document.querySelectorAll("input, select, textarea");

  var camposVacios = Array.from(camposLote).some(function (input) {
    return !input.value.trim() && input.hasAttribute("required");
  });

  if (camposVacios) {
    alert("No pueden haber campos de lote o ficha vacíos.");
    return;
  }
  const form = document.getElementById("actualizar_lote");
  const formData = new FormData(form);
  const currentURL = window.location.href;
  axios
    .post(currentURL, formData)
    .then((response) => {
      window.alert(response.data.mensaje); // Muestra el mensaje en un alert
    })
    .catch((error) => {
      console.error("Error:", error);
      window.alert(error.response.data.mensaje); // Muestra el mensaje de error en un alert
    });
}
