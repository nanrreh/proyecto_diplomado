

//Funcion para ver la informacion de la tabla
function fetchData() {

    let data = new FormData();
    data.append("opcion", "admin")

    fetch("/controllers/Recoleccion.php", {
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
                          <td>${data[i].fecha}</td>
                          <td>${data[i].recolector}</td>
                          <td>${data[i].valvula}</td>
                          <td>${data[i].cantidad} KG</td>
                          <td>${data[i].encargado}</td>
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

    document.querySelector('.add_empleado').classList.remove('hide_btn');
    document.querySelector('.edit_empleado').classList.add('hide_btn');

    document.querySelector(".add_empleado").addEventListener("click", function() {

        var recolector_id = document.getElementById('recolector').value;
        var cantidad = document.querySelector('.cantidad').value;
        var valvula = document.getElementById('valvula').value;
        var encargado = document.getElementById('encargado').value;

        let data = new FormData();
        data.append("opcion", "create");
        data.append("recolector_id", recolector_id);
        data.append("cantidad", cantidad);
        data.append("valvula", valvula);
        data.append("encargado", encargado);

        // Solicitud para registro de válvulas utilizando fetch
        fetch("/controllers/Recoleccion.php", {
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
                    node.innerText = "Se creó la recolección con éxito!!";
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 1200);
                } else {
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error al crear la recolección";
                    document.getElementById('main_empleado').appendChild(node);

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

    document.querySelector('.add_empleado').classList.add('hide_btn');
    document.querySelector('.edit_empleado').classList.remove('hide_btn');

    document.getElementById('text_form').innerText = "Actualizar Recolección";

    document.querySelector('.accordion-button').classList.remove('collapsed');
    document.querySelector('.accordion-collapse').classList.add('show');

    //Capturar la información

    showData(id, "update");

    //Evento click y envia la informacion
    document.querySelector(".edit_empleado").addEventListener("click", function() {

        var recolector_id = document.getElementById('recolector').value;
        var cantidad = document.querySelector('.cantidad').value;
        var valvula = document.getElementById('valvula').value;
        var encargado = document.getElementById('encargado').value;

        let data = new FormData();
        data.append("opcion", "update");
        data.append("recolector_id", recolector_id);
        data.append("cantidad", cantidad);
        data.append("valvula", valvula);
        data.append("encargado", encargado);
        data.append("id", id);

        //Solicitud para registro de válvulas utilizando fetch

        fetch("/controllers/Recoleccion.php", {
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
                    node.innerText = "Recolección modificado con exito";
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 1200);
                } else {

                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error al modificar la Recolección";
                    document.getElementById('main_empleado').appendChild(node);

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
        document.querySelector('.add_empleado').classList.add('hide_btn');
        document.querySelector('.edit_empleado').classList.add('hide_btn');
        document.getElementById('text_form').innerText = "Ver recolección";

        document.querySelector('.accordion-button').classList.remove('collapsed');
        document.querySelector('.accordion-collapse').classList.add('show');
    }

    let data = new FormData();
    data.append("opcion", "show")
    data.append("id", id)

    fetch("/controllers/Recoleccion.php", {
        method: "POST",
        body: data,
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {

            // Recibimos toda la data para llenar la tabla de válvulas
            document.getElementById('recolector').value = data['usuario_id'];
            document.querySelector('.cantidad').value = data['cantidad_fruta'];
            document.getElementById('valvula').value = data['valvula_id'];
            document.getElementById('encargado').value = data['encargado_id'];

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

        fetch("/controllers/Recoleccion.php", {
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
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 1200);

                }else{
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error! no se elimino el registro";
                    document.getElementById('main_empleado').appendChild(node);

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

