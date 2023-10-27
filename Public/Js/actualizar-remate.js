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
  if (window.confirm("¿Seguro que quieres eliminar este remate?")) {
    eliminarRemate();
  }
});

function eliminarRemate() {
  var currentURL = window.location.href;

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
  if (camposVacios() && validarFechas()) {
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
}

function validarFechas() {
  // Obtiene los valores de fecha y hora de inicio y finalización
  var fechaInicioValue = document.getElementById("registro-remate__fecha_inicio_remate").value;
  var fechaFinalValue = document.getElementById("registro-remate__fecha_final_remate").value;

  // Parsea las fechas en objetos Date
  var fechaInicio = new Date(fechaInicioValue);
  var fechaFinal = new Date(fechaFinalValue);

  // Elimina los segundos y milisegundos de las fechas
  fechaInicio.setSeconds(0);
  fechaInicio.setMilliseconds(0);
  fechaFinal.setSeconds(0);
  fechaFinal.setMilliseconds(0);

  // Compara las fechas
  if (fechaInicio >= fechaFinal) {
    alert("La fecha de inicio debe ser menor que la fecha de finalización.");
    return false; // Impide que el formulario se envíe si la validación falla
  }

  return true; // Permite que el formulario se envíe si la validación pasa
}

function camposVacios() {
  var camposRemate = document.querySelectorAll("input, select, textarea");

  var camposVacios = Array.from(camposRemate).some(function (input) {
    return !input.value.trim() && input.hasAttribute("required");
  });

  if (camposVacios) {
    alert("No pueden haber campos vacíos.");
    return false;
  } else {
    return true;
  }
}
