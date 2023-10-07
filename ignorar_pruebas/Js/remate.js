const socket = new WebSocket("ws://localhost:8080"); // Cambia la URL según la ubicación de tu servidor WebSocket
const contadorElement = document.getElementById("contador");
console.log(contadorElement.textContent);

socket.addEventListener("open", (event) => {
  console.log("Conexión WebSocket establecida");
});

socket.addEventListener("message", (event) => {
  // Actualiza el contenido del h2 con el contador más alto recibido del servidor
  contadorElement.textContent = event.data;
});

socket.addEventListener("close", (event) => {
  console.log("Conexión WebSocket cerrada");
});

socket.addEventListener("error", (error) => {
  console.error("Error en la conexión WebSocket:", error);
});

// Función para enviar números al servidor
function sumarNumero() {
  const numero = parseInt(document.getElementById("numeroInput").value, 10);
  if (!isNaN(numero)) {
    socket.send(numero);
  }
}
