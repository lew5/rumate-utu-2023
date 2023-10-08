const socket = new WebSocket("ws://localhost:8080"); // Cambia la URL según la ubicación de tu servidor WebSocket
// Agrega un evento clic al botón de oferta
offerButton.addEventListener("click", function () {
  const oferta = parseInt(inputValue.value, 10);
  if (!isNaN(oferta) && oferta > minValue) {
    // Envia la oferta al servidor WebSocket si es mayor que la mejor oferta
    ofertar();
  }
});
const mejorOferta = document.querySelector(".highest-offer__value");
console.log(mejorOferta.textContent);

socket.addEventListener("open", (event) => {
  console.log("Conexión WebSocket establecida");
});

socket.addEventListener("message", (event) => {
  const nuevaOferta = parseInt(event.data);
  if (!isNaN(nuevaOferta)) {
    // Si la nueva oferta es mayor que minValue, actualiza minValue
    if (nuevaOferta > minValue) {
      minValue = nuevaOferta;
    }

    // Actualiza la mejor oferta en el cliente
    highestOfferValue.textContent = nuevaOferta;

    // Actualiza el valor del input si es menor o igual a minValue
    if (parseInt(inputValue.value) <= minValue) {
      inputValue.value = nuevaOferta;
      toggleOfferButtonState(inputValue.value, minValue);
    }
  }
});

socket.addEventListener("close", (event) => {
  console.log("Conexión WebSocket cerrada");
});

socket.addEventListener("error", (error) => {
  console.error("Error en la conexión WebSocket:", error);
});

// Función para enviar números al servidor WebSocket y actualizar la mejor oferta
function ofertar() {
  const oferta = parseInt(inputValue.value, 10);
  if (!isNaN(oferta)) {
    // Envia la oferta al servidor WebSocket
    socket.send(oferta);

    // Actualiza la mejor oferta en el cliente que hizo la oferta
    highestOfferValue.textContent = oferta;

    minValue = oferta;

    // Deshabilita el botón de oferta después de hacer la oferta
    offerButton.disabled = true;
  }
}
