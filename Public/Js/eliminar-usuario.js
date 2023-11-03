document.addEventListener("DOMContentLoaded", function () {
  const elementosEliminar = document.querySelectorAll(".eliminarUsuario");

  elementosEliminar.forEach(function (elemento) {
    elemento.addEventListener("click", function (event) {
      event.preventDefault();
      if (confirm("¿Seguro que quieres eliminar a este usuario?")) {
        eliminarUsuario(elemento);
      }
    });
  });
});

function eliminarUsuario(elemento) {
  const href = elemento.getAttribute("href");
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
