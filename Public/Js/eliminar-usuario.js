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
