document.addEventListener("DOMContentLoaded", function () {
  const socket = new WebSocket("ws://localhost:8080");
  let inputValue = document.getElementById("offer_value");
  const plusButton = document.getElementById("plusButton");
  const minusButton = document.getElementById("minusButton");
  const highestOfferValue = document.getElementById("mejor_oferta");
  const offerButton = document.getElementById("ofertar-btn");
  const id_lote = document.getElementById("id_lote");
  const id_remate = document.getElementById("id_remate");
  const id_usuario = document.getElementById("id_usuario");

  let minValue = parseInt(highestOfferValue.textContent);
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
    const oferta = parseFloat(inputValue.value); // Utilizamos parseFloat para trabajar con decimales
    if (!isNaN(oferta)) {
      // Creamos un objeto JSON para enviar al servidor
      const ofertaJSON = {
        type: "puja",
        monto: oferta,
        id_usuario: id_usuario.value, // Reemplaza con el ID del cliente
        id_remate: id_remate.value, // Reemplaza con el ID del remate
        id_lote: id_lote.value, // Reemplaza con el ID del lote
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
    const oferta = parseInt(inputValue.value, 10);
    if (!isNaN(oferta) && oferta > minValue) {
      // Envia la oferta al servidor WebSocket si es mayor que la mejor oferta
      ofertar();
    }
  });

  socket.addEventListener("open", () => {
    console.log("Conexión WebSocket establecida");
    const infoRemateLote = {
      type: "infoRemateLote",
      id_lote: id_lote,
      id_remate: id_remate,
    };

    // Convierte el objeto en una cadena JSON y envíala al servidor
    socket.send(JSON.stringify(infoRemateLote));
  });

  socket.addEventListener("message", (event) => {
    const data = event.data;
    try {
      // Intenta analizar el mensaje como JSON
      const message = JSON.parse(data);
      console.log(message);
      if (message) {
        const nuevaOferta = parseFloat(message.monto);

        if (!isNaN(nuevaOferta)) {
          if (nuevaOferta > minValue) {
            minValue = nuevaOferta;
          }

          highestOfferValue.textContent = nuevaOferta;

          if (parseFloat(inputValue.value) <= minValue) {
            inputValue.value = nuevaOferta;
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
