const contadorLotes = document.querySelector("#lotes_guardados span");
const btnPublicar = document.getElementById("publicar");
btnPublicar.disabled = true;
var lotes = [];

var lotesGuardados = 0;
contadorLotes.textContent = lotesGuardados;
// Agregar un lote con su ficha al objeto remate
function agregarLote() {
  var lote = {
    imagen_lote: "sin imagen",
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
  lotes.push(lote);

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
  if (lotesGuardados > 0) {
    var camposLote = document.querySelectorAll(
      ".registro-remate__lote .input-field__input,.registro-remate__ficha .input-field__input"
    );
    camposLote.forEach(function (input) {
      input.removeAttribute("required");
    });
    document.getElementById("lote-data").value = JSON.stringify(lotes);
    var loteData = JSON.parse(document.getElementById("lote-data").value);
  }
}

document.querySelector(".button-link--accent").addEventListener("click", function (e) {
  e.preventDefault();
  guardar();
  if (lotesGuardados >= 1) {
    btnPublicar.disabled = false;
  }
});

document.getElementById("publicar").addEventListener("click", function (e) {
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
