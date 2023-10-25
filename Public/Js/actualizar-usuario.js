console.log("enlazado");
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-actualizar-usuario");
  const actualizarButton = document.getElementById("btn-actualizar-usuario");
  form.querySelectorAll("input, select").forEach((input) => {
    input.addEventListener("change", function () {
      console.log("a");
    });
  });

  actualizarButton.addEventListener("click", function (event) {
    // event.preventDefault();
    // actualizarUsuario();
  });

  // document.getElementById("eliminar-remate").addEventListener("click", function (event) {
  //   event.preventDefault();
  //   if (window.confirm("¿Seguro que quieres eliminar este remate?")) {
  //     eliminarRemate();
  //   }
  // });

  // function eliminarUsuario() {
  //   var currentURL = window.location.href;

  //   // Reemplaza "editar" por "eliminar"
  //   var url = currentURL.replace("editar", "eliminar");
  //   axios
  //     .get(url)
  //     .then((response) => {
  //       console.log("Éxito:", response.data);
  //       window.alert(response.data.mensaje);
  //       window.location.href = "/rumate/";
  //     })
  //     .catch((error) => {
  //       console.error("Error:", error);
  //       window.alert(error.response.data.mensaje);
  //     });
  // }

  function actualizarUsuario() {
    var camposLote = document.querySelectorAll(
      ".perfil__usuario .input-field__input,.perfil__datos-personales .input-field__input"
    );

    var camposVacios = Array.from(camposLote).some(function (input) {
      return !input.value && input.hasAttribute("required");
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
      })
      .catch((error) => {
        console.error("Error:", error);
        window.alert(response.data.mensaje);
      });
  }
});
