document.addEventListener("DOMContentLoaded", function () {
  let inputValue = document.getElementById("offer_value");
  const plusButton = document.getElementById("plusButton");
  const minusButton = document.getElementById("minusButton");
  const highestOfferValue = document.getElementById("mejor_oferta");
  const offerButton = document.getElementById("ofertar-btn");
  const id_lote = document.getElementById("id_lote");
  const id_remate = document.getElementById("id_remate");
  const id_usuario = document.getElementById("id_usuario");
  const idLote = id_lote.value;
  const socket = new WebSocket(`ws://localhost:8080?id_lote=${idLote}`);

  let minValue = parseFloat(highestOfferValue.textContent);
  inputValue.value = minValue;
  toggleOfferButtonState(inputValue.value, minValue);

  function toggleOfferButtonState(currentInputValue, minValue) {
    if (currentInputValue <= minValue) {
      offerButton.disabled = true;
    } else if (currentInputValue > minValue) {
      offerButton.disabled = false;
    }
  }

  // Función para aumentar el valor del input
  plusButton.addEventListener("click", function () {
    const currentInputValue = parseInt(inputValue.value) || 0; // Obtén el valor actual del input como número
    if (inputValue.value < minValue) {
      inputValue.value = minValue; // Establece el valor mínimo si es menor
    } else {
      inputValue.value = currentInputValue + 1; // Aumenta el valor en 1
    }
    toggleOfferButtonState(inputValue.value, minValue);
  });

  // Función para disminuir el valor del input
  minusButton.addEventListener("click", function () {
    const currentInputValue = parseInt(inputValue.value) || 0; // Obtén el valor actual del input como número
    if (currentInputValue > minValue) {
      inputValue.value = currentInputValue - 1; // Disminuye el valor en 1 si es mayor que el mínimo
    }
    toggleOfferButtonState(inputValue.value, minValue);
  });

  function ofertar() {
    const oferta = parseFloat(inputValue.value);
    if (!isNaN(oferta)) {
      const ofertaJSON = {
        type: "puja",
        monto: oferta,
        id_usuario: id_usuario.value,
        id_remate: id_remate.value,
        id_lote: id_lote.value,
      };

      // Convertimos el objeto JSON a una cadena JSON
      const ofertaString = JSON.stringify(ofertaJSON);

      // Envia la oferta al servidor WebSocket
      socket.send(ofertaString);

      // highestOfferValue.textContent = oferta;
      // minValue = oferta;
      // offerButton.disabled = true;
    }
  }

  offerButton.addEventListener("click", function () {
    const oferta = parseFloat(inputValue.value);
    if (!isNaN(oferta) && oferta > minValue) {
      // Envia la oferta al servidor WebSocket si es mayor que la mejor oferta
      ofertar();
    }
  });

  socket.addEventListener("open", () => {
    console.log("Conexión WebSocket establecida");
  });

  socket.addEventListener("message", (event) => {
    const data = event.data;
    try {
      const message = JSON.parse(data);
      console.log(message);
      if (message) {
        const nuevaOferta = message.monto;
        console.log(nuevaOferta);

        if (!isNaN(nuevaOferta)) {
          if (nuevaOferta > minValue) {
            minValue = parseInt(nuevaOferta);
          }

          highestOfferValue.textContent = nuevaOferta;
          console.log(highestOfferValue.textContent);
          if (parseFloat(inputValue.value) <= minValue) {
            inputValue.value = parseInt(nuevaOferta, 10);
            toggleOfferButtonState(inputValue.value, minValue);
          }
        }
      }
    } catch (error) {
      console.error("Error al analizar el mensaje JSON:", error);
    }
  });

  socket.addEventListener("close", () => {
    console.log("Conexión WebSocket cerrada");
  });

  socket.addEventListener("error", (error) => {
    console.error("Error en la conexión WebSocket:", error);
  });
});
