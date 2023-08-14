<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Boticampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/menu.css">
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer.css">
    <link rel="stylesheet" type="text/css" href="../styles/empleados.css">
    <link rel="stylesheet" type="text/css" href="../styles/table.css">
    <script src="../js/empleados.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg main_navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" alt="" class="menu_logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="home.php">Inicio</a>
                    <a class="nav-link" href="valvulas.php">Válvulas</a>
                    <a class="nav-link active" href="empleados.php">Recolectores</a>
                    <a class="nav-link" href="recoleccion.php">Recolección</a>
                    <a class="nav-link" href="roles.php">Roles</a>
                    <a class="nav-link btn_logout" href="/index.php"><img src="../img/logout.png"></a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="main_valvulas" id="main_empleado">
    <div class="container container_page">
        <h1 class="main_title text-center">Empleados</h1>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed btn_acordion" id="text_form" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                        Agregar empleado
                    </button>
                </h2>
                <!--poner show para ver-->
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="" class="formulario_empleados">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nombre de empleado</label>
                                        <input type="text" class="form-control name_empleado" id="exampleFormControlInput1" placeholder="Digite su nombre" name="name_empleado">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Documento de empleado</label>
                                        <input type="text" class="form-control doc_empleado" id="exampleFormControlInput1" placeholder="Digite su documento" name="doc_empleado">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Apellido de empleado</label>
                                        <input type="text" class="form-control lastname_empleado" id="exampleFormControlInput1" placeholder="Digite su apellido" name="lastname_empleado">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control date_empleado" id="exampleFormControlInput1" placeholder="Digite su Fecha de nacimiento" name="date_empleado">
                                    </div>

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                <select class="form-select cargo" aria-label="Default select example" name="cargo">
                                    <option value="">Seleccione</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Empleado</option>
                                    <option value="3">Lider de equipo</option>
                                </select>
                            </div>


                            <div class="mb-3 box_btn_form">
                                <input type="button" class="btn btn-primary add_empleado custom_btn" value="Guardar" />
                                <input type="button" class="btn btn-primary edit_empleado custom_btn" value="Actualizar" />
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Documento</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Cargo</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody class="cuerpo_tabla">
            </tbody>
        </table>

    </div>

</main>

<footer class="main_footer">
    <div class="container footer_container">
        <div class="row align-items-center">
            <b><p class="class="text-center">Nuestras redes sociales</p></b>
            <div class="container_img">
                <a href="https://www.facebook.com/" target="_blank">
                    <img src="../img/fb.png" alt="">
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <img src="../img/ig.png" alt="">
                </a>
                <a href="https://web.whatsapp.com/" target="_blank">
                    <img src="../img/ws.png" alt="">
                </a>
            </div>
            <div class="container_text row align-items-center">
                <p>hsecobla@ibero.edu.co</p>
                <p>lrojash2@ibero.edu.co</p>
                <p>irodri32@ibero.edu.co</p>

                <b><p>Boticampo © 2023. Todos los derechos reservados</p></b>
            </div>
        </div>
    </div>
</footer>



</body>
</html>
