<!DOCTYPE html>
<html>
<head>
    <title>Boticampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/menu.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer.css">
    <link rel="stylesheet" type="text/css" href="../styles/valvulas.css">
    <link rel="stylesheet" type="text/css" href="../styles/table.css">
    <link rel="stylesheet" type="text/css" href="../styles/main.css">

    <script src="../js/valvulas.js"></script>
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
                    <a class="nav-link active" href="valvulas.php">Valvúlas</a>
                    <a class="nav-link" href="empleados.php">Recolectores</a>
                    <a class="nav-link" href="#">Recolección</a>
                    <a class="nav-link" href="#">roles</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="main_valvulas" id="main_valvulas">
    <div class="container container_page">
        <h1 class="main_title text-center">Valvulas</h1>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed btn_acordion" id="text_form" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                        Agregar valvula
                    </button>
                </h2>
                <!--poner show para ver-->
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="" class="formulario_valvulas">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre de válvula</label>
                                <input type="text" class="form-control name_valvula" id="exampleFormControlInput1" placeholder="valvula 1" name="name_valvula">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Estado actual</label>
                                <select class="form-select status" aria-label="Default select example" name="status">
                                    <option value="">Seleccione</option>
                                    <option value="En recoleccion">En recoleccion</option>
                                    <option value="En crecimiento">En crecimiento</option>
                                    <option value="En mantenimiento">En mantenimiento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">comentarios</label>
                                <textarea class="form-control comments" id="exampleFormControlTextarea1" rows="3" name="comments" ></textarea>
                            </div>
                            <div class="mb-3 box_btn_form">
                                <input type="button" class="btn btn-primary custom_btn add_valvula" value="Guardar" />
                                <input type="button" class="btn btn-primary custom_btn edit_valvula" value="Actualizar" />
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
                <th scope="col">Valvúla</th>
                <th scope="col">Estado</th>
                <th scope="col">Comentarios</th>
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
			<p>Irodri32@ibero.edu.co</p>

			<b><p>Boticampo © 2023. Todos los derechos reservados</p></b>
			</div>



        </div>
    </div>
</footer>



</body>
</html>
