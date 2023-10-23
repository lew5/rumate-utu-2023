var remate = {
  titulo_remate: "",
  imagen_remate: "",
  fecha_inicio_remate: "",
  fecha_final_remate: "",
  lotes: [],
};

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
  console.log(remate);
}

function limpiarCampos() {
  var camposLote = document.querySelectorAll(
    ".registro-remate__lote .input-field__input,.registro-remate__ficha .input-field__input"
  );

  for (var i = 0; i < camposLote.length; i++) {
    camposLote[i].value = "";
  }
}

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

function publicar() {
  remate.titulo_remate = document.getElementById("registro-remate__titulo-remate").value;
  remate.imagen_remate = document.getElementById("registro-remate__imagen_remate").value;
  remate.fecha_inicio_remate = document.getElementById(
    "registro-remate__fecha_inicio_remate"
  ).value;
  remate.fecha_final_remate = document.getElementById("registro-remate__fecha_final_remate").value;
  document.getElementById("remate-data").value = JSON.stringify(remate);
  var remateData = JSON.parse(document.getElementById("remate-data").value);
  console.log(remateData);
}

document.querySelector(".button-link--accent").addEventListener("click", function (e) {
  e.preventDefault();
  guardar();
});

document.getElementById("publicar").addEventListener("click", function () {
  publicar();
});
