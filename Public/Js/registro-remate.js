const contadorLotes = document.querySelector("#lotes_guardados span");
const btnPublicar = document.getElementById("publicar");
btnPublicar.disabled = true;
var remate = {
  titulo_remate: "",
  imagen_remate: "",
  fecha_inicio_remate: "",
  fecha_final_remate: "",
  lotes: [],
};

var lotesGuardados = 0;
contadorLotes.textContent = lotesGuardados;
// Agregar un lote con su ficha al objeto remate
function agregarLote() {
  var lote = {
    imagen_lote: "null",
    precio_base_lote: parseFloat(
      document.getElementById("registro-remate__precio-base-lote").value
    ),
    proveedor: document.getElementById("registro-remate__proveedor-lote").value,
    categoria: document.getElementById("registro-remate__categoria").value,
    ficha: {
      peso_ficha: parseFloat(document.getElementById("registro-remate__peso-ficha").value),
      cantidad_ficha: parseInt(document.getElementById("registro-remate__cantidad-ficha").value),
      raza_ficha: document.getElementById("registro-remate__raza-ficha").value,
      descripcion_ficha: document.getElementById("registro-remate__descripcion_ficha").value,
    },
  };

  // Agregar el lote al objeto remate
  remate.lotes.push(lote);

  lotesGuardados++;
  contadorLotes.textContent = lotesGuardados;
}

function limpiarCampos() {
  var camposLote = document.querySelectorAll(
    ".registro-remate__lote .input-field__input,.registro-remate__ficha .input-field__input"
  );

  for (var i = 0; i < camposLote.length; i++) {
    camposLote[i].value = "";
  }
}

function publicar() {
  // Si hay lotes guardados, eliminar los atributos required de los campos de lote y ficha
  if (lotesGuardados > 0 && validarFechas()) {
    var camposLote = document.querySelectorAll(
      ".registro-remate__lote .input-field__input,.registro-remate__ficha .input-field__input"
    );
    camposLote.forEach(function (input) {
      input.removeAttribute("required");
    });
    remate.titulo_remate = document.getElementById("registro-remate__titulo-remate").value;
    remate.imagen_remate = document.getElementById("registro-remate__imagen_remate").value;
    remate.fecha_inicio_remate = document.getElementById(
      "registro-remate__fecha_inicio_remate"
    ).value;
    remate.fecha_final_remate = document.getElementById(
      "registro-remate__fecha_final_remate"
    ).value;
    document.getElementById("remate-data").value = JSON.stringify(remate);
    var remateData = JSON.parse(document.getElementById("remate-data").value);
  }
}

document.querySelector(".button-link--accent").addEventListener("click", function (e) {
  e.preventDefault();
  guardar();
  if (lotesGuardados >= 1) {
    btnPublicar.disabled = false;
  }
});

btnPublicar.addEventListener("click", function (e) {
  publicar();
});

function guardar() {
  var camposLote = document.querySelectorAll(
    ".registro-remate__lote .input-field__input,.registro-remate__ficha .input-field__input"
  );

  var camposVacios = Array.from(camposLote).some(function (input) {
    return !input.value && input.hasAttribute("required");
  });

  if (camposVacios) {
    alert("No pueden haber campos de lote o ficha vacíos.");
    return;
  }

  agregarLote();
  limpiarCampos();
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
