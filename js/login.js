
function loginInvitado(){


    document.querySelector(".invitado").addEventListener("click", function() {

        var username = 'invitado';

        let data = new FormData();
        data.append("username", username);

        // Solicitud para iniciar sesion
        fetch("/controllers/Login.php", {
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
                    node.innerText = "Inicio sesion exitoso!!";
                    document.getElementById('main_login').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        location.href = 'views/home.php';
                    }, 1200);



                } else {
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Inicio sesion fallido";
                    document.getElementById('main_login').appendChild(node);

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


function login(){


    document.querySelector(".btn_login").addEventListener("click", function() {

        var username = document.getElementById("txt_username").value;
        var password = document.getElementById("txt_password").value;

        let data = new FormData();
        data.append("username", username);
        data.append("password", password);

        // Solicitud para iniciar sesion
        fetch("/controllers/Login.php", {
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
                    node.innerText = "Inicio sesion exitoso!!";
                    document.getElementById('main_login').appendChild(node);

                    setTimeout(function() {
                        node.remove();
                        location.href = 'views/home.php';
                    }, 1200);


                } else {
                    node.className = "alert alert-danger alert_msg";
                    node.ariaRoleDescription = "alert";
                    node.innerText = "Inicio sesion fallido";
                    document.getElementById('main_login').appendChild(node);

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

// Llamamos a la función para obtener los datos y llenar la tabla al cargar la página
document.addEventListener("DOMContentLoaded", function () {
   login();
    loginInvitado();
});




