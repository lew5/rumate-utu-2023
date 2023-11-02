console.log("enlazado");
const aEliminarUsuario = document.getElementById("eliminarUsuario");
aEliminarUsuario.addEventListener("click", function (event) {
  event.preventDefault();
  if (confirm("¿seguro que quieres eliminar a este usuario?")) {
    eliminarUsuario();
  }
});

function eliminarUsuario() {
  const href = aEliminarUsuario.getAttribute("href");
  axios
    .get(href)
    .then((response) => {
      window.alert(response.data.mensaje);
      location.reload();
    })
    .catch((error) => {
      window.alert(error.response.data.mensaje);
    });
}
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-actualizar-usuario");
  const actualizarButton = document.getElementById("btn-actualizar-usuario");
  form.querySelectorAll("input, select").forEach((input) => {
    input.addEventListener("change", function () {});
  });

  actualizarButton.addEventListener("click", function (event) {
    event.preventDefault();
    actualizarUsuario();
  });

  function actualizarUsuario() {
    var camposLote = document.querySelectorAll(
      ".perfil__usuario .input-field__input,.perfil__datos-personales .input-field__input"
    );

    var camposVacios = Array.from(camposLote).some(function (input) {
      return !input.value.trim() && input.hasAttribute("required");
    });

    if (camposVacios) {
      alert("No pueden haber campos de lote o ficha vacíos.");
      return;
    }
    const form = document.getElementById("form-actualizar-usuario");
    const formData = new FormData(form);
    console.log(formData);
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
