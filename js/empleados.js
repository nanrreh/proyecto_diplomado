
//Funcion para ver la informacion de la tabla
function fetchData() {

    let data = new FormData();
    data.append("opcion", "admin")

    fetch("/controllers/Usuarios.php", {
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
                          <td>${data[i].id_usuario}</td>
                          <td>${data[i].nombres}</td>
                          <td>${data[i].apellidos}</td>
                          <td>${data[i].documento}</td>
                          <td>${data[i].fecha_nacimiento}</td>
                          <td>${data[i].cargo}</td>
                          <td>
                            <button class="table_btn show" onclick="showData(${data[i].id_usuario})">
                              <img src="../img/show.png" alt="">
                            </button>
                            <button class="table_btn edit" onclick="updateData(${data[i].id_usuario})">
                              <img src="../img/edit.png" alt="">
                            </button>
                            <button class="table_btn delete" onclick="deleteData(${data[i].id_usuario})">
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

    //Botones de validacion
    document.querySelector('.add_empleado').classList.remove('hide_btn');
    document.querySelector('.edit_empleado').classList.add('hide_btn');

    document.querySelector(".add_empleado").addEventListener("click", function() {

        var nombres = document.querySelector(".name_empleado").value;
        var apellidos = document.querySelector(".lastname_empleado").value;
        var documento = document.querySelector(".doc_empleado").value;
        var fecha_nacimiento = document.querySelector(".date_empleado").value;
        var cargo = document.querySelector(".cargo").value;

        let data = new FormData();
        data.append("opcion", "create");
        data.append("nombres", nombres);
        data.append("apellidos", apellidos);
        data.append("documento", documento);
        data.append("fecha_nacimiento", fecha_nacimiento);
        data.append("cargo", cargo);

        // Solicitud para registro de válvulas utilizando fetch
        fetch("/controllers/Usuarios.php", {
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
                    node.innerText = "Se creó el usuario con éxito!!";
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 2000);
                } else {
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error al crear el usuario";
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                    }, 2000);
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
    document.getElementById('text_form').innerText = "Actualizar empleado";

    document.querySelector('.accordion-button').classList.remove('collapsed');
    document.querySelector('.accordion-collapse').classList.add('show');

    //Capturar la información

    showData(id, "update");

    //Evento click y envia la informacion
    document.querySelector(".edit_empleado").addEventListener("click", function() {

        var nombres = document.querySelector(".name_empleado").value;
        var apellidos = document.querySelector(".lastname_empleado").value;
        var documento = document.querySelector(".doc_empleado").value;
        var fecha_nacimiento = document.querySelector(".date_empleado").value;
        var cargo = document.querySelector(".cargo").value;

        let data = new FormData();
        data.append("opcion", "update");
        data.append("nombres", nombres);
        data.append("apellidos", apellidos);
        data.append("documento", documento);
        data.append("fecha_nacimiento", fecha_nacimiento);
        data.append("cargo", cargo);
        data.append("id", id);

        //Solicitud para registro de empleados utilizando fetch

        fetch("/controllers/Usuarios.php", {
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
                    node.innerText = "Usuario modificado con exito";
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        window.location.reload();
                    }, 2000);
                } else {

                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error al modificar el usuario";
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
        document.getElementById('text_form').innerText = "Ver Empleado";

        document.querySelector('.accordion-button').classList.remove('collapsed');
        document.querySelector('.accordion-collapse').classList.add('show');
    }

    let data = new FormData();
    data.append("opcion", "show")
    data.append("id", id)

    fetch("/controllers/Usuarios.php", {
        method: "POST",
        body: data,
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {

            // Recibimos toda la data para llenar la tabla de válvulas
            document.querySelector(".name_empleado").value = data['nombres'];
            document.querySelector(".lastname_empleado").value = data['apellidos'];
            document.querySelector(".doc_empleado").value = data['documento'];
            document.querySelector(".date_empleado").value = data['fecha_nacimiento'];
            document.querySelector(".cargo").value = data['cargo_id'];

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

        fetch("/controllers/Usuarios.php", {
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
                    }, 2000);

                }else{
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Error! no se elimino el registro";
                    document.getElementById('main_empleado').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                    }, 2000);
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

