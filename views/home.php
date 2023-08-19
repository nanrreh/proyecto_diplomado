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
    <link rel="stylesheet" type="text/css" href="../styles/home.css">
    <script src="../js/home.js"></script>
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
            <div class="collapse navbar-collapse menu_container" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                    <?php if ($_SESSION['username'] != 'invitado'){?>
                        <a class="nav-link" href="valvulas.php">Válvulas</a>
                        <a class="nav-link" href="empleados.php">Empleados</a>
                        <a class="nav-link" href="recoleccion.php">Recolección</a>
                        <a class="nav-link" href="roles.php">Roles</a>
                    <?php } ?>

                </div>
                <div class="sesion_info">
                    <a class="nav-link"> Hola!  <?php echo $_SESSION['username']; ?></a>
                    <a class="nav-link btn_logout" href="/controllers/Logout.php"><img src="../img/logout.png"></a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="main_home">
    <div class="container text-center container_columns">
        <h1 class="main_title text-center">Resumen</h1>
        <div class="row content_home">
            <div class="col">
                <h2 class="subtitle text-center">Promedios bajos</h2>
                <ul class="list-group cuerpo_lista">
                </ul>
            </div>
            <div class="col position-relative container_podio">
                <h2 class="subtitle text-center">Los mejores promedios</h2>
                <div class="podio_raiting">
                    <div class="card" id="card_2">
                        <img src="" alt="" class="profile_picture">

                        <div class="base">
                            <img src="../img/silver.png" alt="" class="medal">
                            <div class="group_text">
                                <p class="name text-center"></p>
                                <p class="peso text-center"></p>
                            </div>

                        </div>
                    </div>
                    <div class="card" id="card_1">
                        <img src="" alt="" class="profile_picture jumping-box">
                        <div class="base">
                            <img src="../img/gold.png" alt="" class="medal">
                            <div class="group_text">
                                <p class="name text-center"></p>
                                <p class="peso text-center"></p>
                            </div>

                        </div>

                    </div>
                    <div class="card" id="card_3">
                        <img src="" alt="" class="profile_picture">

                        <div class="base">
                            <img src="../img/bronze.png" alt="" class="medal">
                            <div class="group_text">
                                <p class="name text-center"></p>
                                <p class="peso text-center"></p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col col_farmer">
                <h2 class="subtitle text-center">Conoce el empleado del mes</h2>
                <div>
                    <button type="button" class="reset_style"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="../img/champion-the-best.gif">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-lg modal_winner" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body black_body">
                    <button type="button" class="btn-close btn_close_modal" data-bs-dismiss="modal" aria-label="Close"></button>

                    <img src="../img/bg_winner.jpg" class="img_bgwinner">
                    <img src="../img/person2.jpg" class="img_photowinner">
                    <h2 class="name_winner">Hernan Seco</h2>
                </div>
            </div>
        </div>
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
