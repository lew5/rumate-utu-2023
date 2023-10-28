// const socket = new WebSocket("ws://localhost:8080");

// socket.addEventListener("open", (event) => {
//   console.log("Conexión WebSocket establecida");
// });

// socket.addEventListener("message", (event) => {
//   // Actualiza el contenido del h2 con el contador más alto recibido del servidor
//   contadorElement.textContent = event.data;
// });

// socket.addEventListener("close", (event) => {
//   console.log("Conexión WebSocket cerrada");
// });

// socket.addEventListener("error", (error) => {
//   console.error("Error en la conexión WebSocket:", error);
// });

// // Función para enviar números al servidor
// function sumarNumero() {
//   const numero = parseInt(document.getElementById("numeroInput").value, 10);
//   if (!isNaN(numero)) {
//     socket.send(numero);
//   }
// }

let inputValue = document.getElementById("offer_value");
const plusButton = document.getElementById("plusButton");
const minusButton = document.getElementById("minusButton");
const highestOfferValue = document.getElementById("mejor_oferta");
const offerButton = document.getElementById("ofertar-btn");

console.log(inputValue);
console.log(plusButton);
console.log(minusButton);
console.log(highestOfferValue);
console.log(offerButton);

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
  console.log("currentInputValue " + currentInputValue);
  console.log("minValue " + minValue);
  if (currentInputValue > minValue) {
    inputValue.value = currentInputValue - 1; // Disminuye el valor en 1 si es mayor que el mínimo
  }
  toggleOfferButtonState(inputValue.value, minValue);
});
