

//Funcion para ver la informacion de la tabla
function fetchData() {

    let data = new FormData();
    data.append("opcion", "admin")

    fetch("/controllers/Roles.php", {
        method: "POST",
        body: data,
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // Recibimos toda la data para llenar la tabla de válvulas
            for (var i = 0; i < data.length; i++) {
                var tr = `
                        <tr>
                          <td>${data[i].id}</td>
                          <td>${data[i].nombre_cargo}</td>
                          <td>${data[i].nombre_cargo}</td>
                          <td>
                            <button class="table_btn show" onclick="showData(${data[i].id})">
                              <img src="../img/show.png" alt="">
                            </button>
                            <button class="table_btn edit" onclick="updateData(${data[i].id})">
                              <img src="../img/edit.png" alt="">
                            </button>
                            <button class="table_btn delete" onclick="deleteData(${data[i].id})">
                              <img src="../img/delete.png" alt="">
                            </button>
                          </td>
                        </tr>`;
                document.querySelector(".cuerpo_tabla").insertAdjacentHTML("beforeend", tr);
            }
        })
        .catch(function (error) {
            console.error("Error al obtener los datos: ", error);
        });
}

//funcion para guardar la informacion
function saveData(){

    document.querySelector('.add_valvula').classList.remove('hide_btn');
    document.querySelector('.edit_valvula').classList.add('hide_btn');

    document.querySelector(".add_valvula").addEventListener("click", function() {

        var nombre = document.querySelector(".name_rol").value;

        let data = new FormData();
        data.append("opcion", "create");
        data.append("nombre", nombre);

        // Solicitud para registro de válvulas utilizando fetch
        fetch("/controllers/Roles.php", {
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
                const node = document.createElement("div");
                if (data === true) {
                    node.className = "alert alert-success alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Se creó el rol con éxito!!";
                    document.getElementById('main_valvulas').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 1200);
                } else {
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error al crear el rol";
                    document.getElementById('main_valvulas').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                    }, 1200);
                }
            })
            .catch(function(error) {
                console.error("Error en la solicitud: " + error.message);
            });
    });

}

//funcion para modificar la informacion
function updateData(id){

    document.querySelector('.add_valvula').classList.add('hide_btn');
    document.querySelector('.edit_valvula').classList.remove('hide_btn');

    document.getElementById('text_form').innerText = "Actualizar Rol";

    document.querySelector('.accordion-button').classList.remove('collapsed');
    document.querySelector('.accordion-collapse').classList.add('show');

    //Capturar la información

    showData(id, "update");

    //Evento click y envia la informacion
    document.querySelector(".edit_valvula").addEventListener("click", function() {

        var nombre = document.querySelector(".name_rol").value;

        let data = new FormData();
        data.append("opcion", "update");
        data.append("nombre", nombre);
        data.append("id", id);

        //Solicitud para registro de válvulas utilizando fetch

        fetch("/controllers/Roles.php", {
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

                const node = document.createElement("div");

                if (data === true) {

                    node.className = "alert alert-success alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Rol modificado con exito";
                    document.getElementById('main_valvulas').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 1200);
                } else {

                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error al modificar el rol";
                    document.getElementById('main_valvulas').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                    }, 1200);
                }
            })
            .catch(function(error) {
                console.error("Error en la solicitud: " + error.message);
            });
    });

}

//Funcion para mostrar la informacion
function showData(id, type){

    if (type != "update"){
        document.querySelector('.add_valvula').classList.add('hide_btn');
        document.querySelector('.edit_valvula').classList.add('hide_btn');
        document.getElementById('text_form').innerText = "Ver rol";

        document.querySelector('.accordion-button').classList.remove('collapsed');
        document.querySelector('.accordion-collapse').classList.add('show');
    }

    let data = new FormData();
    data.append("opcion", "show")
    data.append("id", id)

    fetch("/controllers/Roles.php", {
        method: "POST",
        body: data,
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {

            // Recibimos toda la data para llenar la tabla de válvulas
            document.querySelector(".name_rol").value = data['nombre_cargo'];

        })
        .catch(function (error) {
            console.error("Error al obtener los datos: ", error);
        });

}

//Funcion para Eliminar la informacion
function deleteData(id){

    if(confirm('Seguro desea eliminar el registro?')){

        let data = new FormData();
        data.append("opcion", "delete")
        data.append("id", id)

        fetch("/controllers/Roles.php", {
            method: "POST",
            body: data,
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                const node = document.createElement("div");

                if (data == true){

                    node.className = "alert alert-success alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Se elimino el registro correctamente";
                    document.getElementById('main_valvulas').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 1200);

                }else{
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error! no se elimino el registro";
                    document.getElementById('main_valvulas').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                    }, 1200);
                }


            })
            .catch(function (error) {
                console.error("Error al obtener los datos: ", error);
            });
    }

}


// Llamamos a la función para obtener los datos y llenar la tabla al cargar la página
document.addEventListener("DOMContentLoaded", function () {
    fetchData();
    saveData();
});

