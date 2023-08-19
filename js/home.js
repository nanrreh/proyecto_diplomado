
function promedios() {

    let data = new FormData();
    data.append("opcion", "promedio");

    // Solicitud para obtener promedio bajo
    fetch("/controllers/Home.php", {
        method: "POST",
        body: data,
    })
        .then(function(response) {
            if (!response.ok) {
                throw new Error("Error en la solicitud: " + response.status);
            }
            return response.json();
        })
        .then(function(data) {

            for (var i = 0; i < data.length; i++) {
                var tr = `<li class="list-group-item">${data[i].nombre_completo}</li>`;

                document.querySelector(".cuerpo_lista").insertAdjacentHTML("beforeend", tr);
            }

        })
        .catch(function(error) {
            console.error("Error en la solicitud: " + error.message);
        });

}


function mejores() {

    let data = new FormData();
    data.append("opcion", "mejores");

    // Solicitud para obtener mejores
    fetch("/controllers/Home.php", {
        method: "POST",
        body: data,
    })
        .then(function(response) {
            if (!response.ok) {
                throw new Error("Error en la solicitud: " + response.status);
            }
            return response.json();
        })
        .then(function(data) {

            for (var i = 0; i < data.length; i++) {

                if (i == 0){
                    document.querySelector('#card_1 .name').innerHTML = data[i].nombre_completo;
                    document.querySelector('#card_1 .peso').innerHTML = data[i].cantidad;
                    document.querySelector('#card_1 .profile_picture').src = data[i].path;
                }

                if (i == 1){
                    document.querySelector('#card_2 .name').innerHTML = data[i].nombre_completo;
                    document.querySelector('#card_2 .peso').innerHTML = data[i].cantidad;
                    document.querySelector('#card_2 .profile_picture').src = data[i].path;
                }

                if (i == 2){
                    document.querySelector('#card_3 .name').innerHTML = data[i].nombre_completo;
                    document.querySelector('#card_3 .peso').innerHTML = data[i].cantidad;
                    document.querySelector('#card_3 .profile_picture').src = data[i].path;
                }
            }

        })
        .catch(function(error) {
            console.error("Error en la solicitud: " + error.message);
        });

}


function best() {

    let data = new FormData();
    data.append("opcion", "best");

    // Solicitud para obtener mejores
    fetch("/controllers/Home.php", {
        method: "POST",
        body: data,
    })
        .then(function(response) {
            if (!response.ok) {
                throw new Error("Error en la solicitud: " + response.status);
            }
            return response.json();
        })
        .then(function(data) {

            document.querySelector('.name_winner').innerHTML = data['nombre_completo'];
            document.querySelector('.img_photowinner').src = data['path'];

        })
        .catch(function(error) {
            console.error("Error en la solicitud: " + error.message);
        });

}

// Llamamos a la función para obtener los datos y llenar la tabla al cargar la página
document.addEventListener("DOMContentLoaded", function () {
    promedios();
    mejores();
    best();
});

