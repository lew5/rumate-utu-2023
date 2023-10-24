document.addEventListener("DOMContentLoaded", function () {
  const inputBusqueda = document.getElementById("busqueda_remate");
  const cardContainerContainer1024 = document.querySelector("main div.container-1024");

  inputBusqueda.addEventListener("input", function () {
    const searchTerm = inputBusqueda.value;
    var currentURL = window.location.href;
    if (searchTerm == "") {
      var urlSearch = currentURL + "buscar/remate/*";
      axios
        .get(urlSearch)
        .then(function (response) {
          // Limpia el container-1024
          cardContainerContainer1024.innerHTML = "";
          cardContainerContainer1024.innerHTML = response.data;
        })
        .catch(function (error) {
          console.error("Error en la solicitud AJAX");
        });
    } else {
      var urlSearch = currentURL + "buscar/remate/" + searchTerm;
      axios
        .get(urlSearch)
        .then(function (response) {
          // Limpia el container-1024
          cardContainerContainer1024.innerHTML = "";
          cardContainerContainer1024.innerHTML = response.data;
        })
        .catch(function (error) {
          cardContainerContainer1024.innerHTML = "";
        });
    }
  });
});
